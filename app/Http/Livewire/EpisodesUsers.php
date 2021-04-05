<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EpisodesUsers extends Component
{
    public  $session_value = ' ';

    public $series;

    public $session_tag;



    /**
     *
     *  This function below is going to attach the value of the id of the audio to the session ... that is what will make the toggle play/pause persistent
     *
     * @param int;
     *
     *
     **/
    public function attachToSession($value){
        //first we call the global session helper function
        //then we attach the key and value to the session....
        $this->session_value = $value;
        session()->put(['episode',$this->session_value]);
        return $this->session_tag =  session()->has('episode')[1];
    }

    public function render()
    {
        dd($this->session_tag);
        return
            <<< 'HTML'
                       <div class= "border-b border-gray-200  play w-full flex items-center align-middle flex-row h-48 px-2">
                            {{--                this is where the picture of the episode is --}}
                            <div class="w-20 h-20">
                                <img src="{{asset($series->series->image)}}"  class="w-16 h-16 shadow-lg "/>
                            </div>
                                {{--                this is where the title of the episode is --}}
                            <div class="flex flex-col">
                                 <div class="capitalize mb-4">
                                {{$this->series->series->title}}
                                </div>

                                <div class="font-semibold text-lg mb-4 capitalize">
                                {{$this->series->title}}
                                </div>

                                 <div class="w-full">
                                    <a wire:click.prevent="attachToSession({{$this->series->id}})" id="pressToPlay" title="Play Episode" href="#" role="button" class="w-10 h-10 border-gray-300 border flex items-center justify-center fill-current text-black" >
                                        <input type="hidden" wire:model="session_tag" value="{{$this->series->id}}"/>
                                        <img src="{{asset('svg/16598474131543238913.svg')}}" class="h-6 w-6">
                                    </a>

                                     <a id="pressToPause" href="#" class="w-10 h-10 border-gray-300 border hidden items-center justify-center fill-current text-black">
                                         <img src="{{asset('svg/3827448171554125778.svg')}}" class="h-8 w-8">
                                     </a>
                                 </div>
                            </div>
                       </div>

            HTML;

    }
}
