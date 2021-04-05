<?php

namespace App\Http\Livewire;

use App\Models\Series;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddSeries extends Component
{
    use WithFileUploads;

    public $title;
    public $image;
    public $description;
    public $speakers;

    protected $rules = [
      'title'=>'required',
      'description'=>'required',
      'speakers'=>'required',
      'image'=>'required|image|max:1024'
    ];

    public function save(){
//        $this->validate([
//            'image'=>$this->image
//        ]);
        //execution will not reach here if the validation fails
         $path = $this->image->store('photos','public');
         return $path;
    }

    public function submit(){
        $this->validate();

        //execution will not reach here if the validation fails

        Series::create([
            'title'=>$this->title,
            'speakers'=>$this->speakers,
            'description'=>$this->description,
            'image'=>$this->save(),
        ]);

        return redirect()->route('admin.podcast.home');



    }

    public function render()
    {
        return view('livewire.add-series');
    }
}
