<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use App\Models\Series;
use Illuminate\Http\Request;

class PodcastController extends Controller
{

    /****
     *
     * This function returns the list of episodes in a series
     * @param $id string
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(string $id){
        $series = Series::with(['podcasts'])->find($id);
        return view('podcasts.full-series',[
            'series'=>$series,
        ]);

    }



    public function episodeOnLoad($id){
        return Podcast::with(['series'])->where('id',$id)->get();
    }
}
