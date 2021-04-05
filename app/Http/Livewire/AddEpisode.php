<?php

namespace App\Http\Livewire;

use App\Models\Podcast;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Jobs\ProcessPodcast;
class AddEpisode extends Component
{
    use WithFileUploads;
    public $title;
    public $date;
    public $description;
    public $audio;
    public $series;



    protected $rules = [
        'title'=>'required',
        'date'=>'required',
        'description'=>'required',
        'audio'=>'file|mimes:mp3,ogg,avi,mp4 |max:2048000'
    ];

    public function mount($series){
        $this->series = $series;
    }

    public function save(){

        //this function is what handles the media file

       return $path = Storage::disk('podcasts')->putFile('/',$this->audio);// this has saved it into the podcasts folder in the public directory


    }




    public function submit(){

        $this->validate();
        //this will throw an exception if it doesn't meet the criteria

        $podcast = Podcast::create([
            'title'=>$this->title,
            'podcast_date'=>$this->date,
            'description'=>$this->description,
            'audio'=>$this->save(),
            'series_id'=>$this->series,
            'length'=>' ',
            'audio_stream'=>' '
        ]);

        ProcessPodcast::dispatch($podcast);
    }

    public function render()
    {
        return <<<'blade'

        <form wire:submit.prevent="submit">
            <div>

                {{-- If your happiness depends on money, you will never be happy with yourself. --}}
                <div class="w-full h-auto p-2 flex flex-col">
                    <div x-data="{isUploading:false, progress:0}" class="w-full md:w-6/12 m-2 py-2">
                        <input type="file" wire:model="audio" x-ref="audioInput" accept="audio/mp3" class="hidden"/ >
                        <div @click="$refs.audioInput.click()" class="w-full h-20 bg-gray-200 border border-black border-dashed flex items-center justify-center">
                            click to save your audio file
                        </div>
                    </div>

                    <div class="w-full flex flex-col p-4  my-2">
                         <x-label for="title" :value="__('Episode Title')" />
                        <x-input type="text" wire:model="title" required autofocus />
                        @error('title') <span class="error">{{ $message }}</span> @enderror
                    </div>

                     <div class="w-full flex flex-col p-4  my-2">
                        <x-label for="date" :value="__('Episode date')" />
                        <x-input type="date" wire:model="date" required />
                        @error('date') <span class="error">{{ $message }}</span> @enderror
                    </div>

                     <div class="w-full flex flex-col p-4  my-2">
                         <x-label for="description" :value="__('Description')" />
                        <x-text-area wire:model="description" class="h-40" style="resize: none;" placeholder="Write a brief decsription of the episode..."/>
                        @error('description') <span class="error">{{ $message }}</span> @enderror
                    </div>


                    <div class="w-full flex flex-row p-4  my-2 justify-between">
                    <div class="w-6/12">
                        <button type="submit" class="rounded-none bg-black inline-flex items-center px-4 py-2 border border-transparent font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-400 active:bg-gray-400 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                            {{__('Add episode')}}
                        </button>
                       </div>

                        <div class="w-6/12 justify-end flex">
                             <button type="button" class=" rounded-none inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-400 active:bg-gray-400 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300  " @click="popupdiv = false">
                                {{__('cancel')}}
                            </button>
                        </div>
                    </div>

                </div>

            </div>
        </form>
        blade;
    }
}
