@props(['series'=>$series])
<div class="w-full bg-white flex flex-col ">
{{--    this is where the loopng starts --}}
    <div class="w-full flex flex-col">
        @foreach($series as $series)
            <div  wire:click="getEpisode({{$series->id}})" class=" play w-full flex items-center align-middle flex-row h-16 sm:hover:bg-gray-50 px-2 justify-between cursor-pointer">
{{--                this is where the title of tghe episode is --}}
                <div class="w-4/12">
                    {{$series->title}}
                </div>
                <div class="w-4/12 flex justify-end">
                    {{$series->length}}
                </div>
            </div>
            @endforeach
    </div>
</div>


