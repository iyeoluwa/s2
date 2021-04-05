<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(){
      // this function will return each of the podcasts series
      $series = Series::with('podcasts')->latest()->get();


      return view('admin.podcasts.podcasts',[
          'series'=>$series,
      ]);
    }
    public function show(){
          //this function displays the series form
        return view('admin.podcasts.add-series');
    }
    public function fullSeries(Series $id){

        return view('admin.podcasts.series-full',[
            'series'=>$id
        ]);
    }
    public function update(){

    }
    public function publicShow(){
        $series = Series::with(['podcasts'])->latest()->get();
        return view('podcasts.index',[
        'series'=>$series
        ]);
    }
}
