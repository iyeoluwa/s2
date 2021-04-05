@props(['series'=>$series])
<div class="w-full bg-white p-16 px-48 h-auto min-h-screen flex flex-col" x-data="{isShowing:true}">

<x-episode-navigation/>
{{--    this is where the loopng starts --}}
    <div class="w-full p-8 flex flex-col">
        @foreach($series as $series)
            <livewire:episodes-users  :series="$series"/>
        @endforeach
    </div>
</div>


