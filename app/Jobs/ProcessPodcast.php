<?php

namespace App\Jobs;
use Carbon\Carbon;
use App\Models\Podcast;
use FFMpeg\Format\Audio\Aac;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use ProtoneMedia\LaravelFFMpeg\Support\ServiceProvider;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessPodcast implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * The podcast instance .
     *
     * @var \App\Models\Podcast
    */
    protected $podcast;


    /**
     * Create a new job instance.
     *
     * @param App\Models\Podcast $podcast
     * @return void
     */
    public function __construct(Podcast $podcast)
    {
        $this->podcast = $podcast;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //creating the audio format...
        $streambleAudioFormat = new Aac;
        //open the audio from disk --- this will change when it goes to production
        $audio = $this->podcast->audio;
        FFMpeg::fromDisk('podcasts')->open($audio)

            //activate the exporter by calling the export method
            ->export()

            //tell the media exporter where to store it in
            ->toDisk('streamable_podcasts')// reminder remember to set a cloudinary drive for the audio

            //tell the media exporter the format you want it in
            ->inFormat($streambleAudioFormat)

            //call the save method with a file name
            ->save($this->podcast->id . '.aac');

        //update the database so we know the conversion is done...
        $this->podcast->update([
            'audio'=> Storage::disk('podcasts')->url($audio),
            'converted_for_streaming_at'=>Carbon::now(), //set the date to now..
            'audio_stream'=>Storage::disk('streamable_podcasts')->url($this->podcast->id . '.aac'), // set the new streaming podcasts
        ]);
    }
}
