<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Series;
use App\Models\Podcast;

class PodcastList extends Component
{

    public  $series;
    public $seriesCardId;
    public $episode;
    public function getSeriesid($id){
        // we have tested that it works
        // nnow it's time to use eloquent
        $this->seriesCardId = Series::with(['podcasts'])->find($id);
        return $this->seriesCardId;

    }
    /**
     * this function is to attach the song url to the player
    **/
    public function getEpisode($id){
        //get the url but using the episode id ..
        //first we fetch the url whole edpisode (this will be useful later)
        $this->episode  = Podcast::with(['series'])->find($id);//we eager loaded the series so that can better optimise our queries
       // return the values you get

        return $this->episode;

    }

    public function render()
    {
        return view('livewire.podcast-list');
    }
}
