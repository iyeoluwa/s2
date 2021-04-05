@props(['series'=>$series])

<div x-data="{ popupdiv: false }" @click.away="popupdiv = false" @close.stop="popupdiv = false">
<div {{$attributes->merge(['class'=>'w-full flex py-2 flex-row'])}} >
    <div class="w-full h-auto flex flex-col lg:flex-row">
        <div class="w-full md:w-auto   lg:w-3/12 xl:w-2/12 justify-center lg:justify-start flex my-2 ">
            <img src="{{asset($series->image)}}" rel="{{$series->title .' image' }}" class="w-48 h-48">
        </div>
        <div class="lg:justify-start justify-center flex flex-col w-full lg:w-6/12">
            <div class="text-xl tracking-wide p-2 leading-8 font-medium lg:text-left text-center">{{$series->title}}</div>
            <div class="text-md lg:text-left text-center p-2 ">{{$series->speakers}}</div>
            @can('edit articles')
                <div class="md:w-full p-2 md:px-0 md:my-2 w-full flex flex-col lg:justify-start  md:flex-row justify-center ">
                    <div class="justify-center lg:justify-start flex ">
                        <x-button class="bg-gray-400 rounded-l-2xl m-2 rounded-r-2xl">
                            {{__('edit series')}}
                        </x-button>
                        <x-button class="bg-red-700 rounded-l-2xl m-2 rounded-r-2xl">
                            {{__('delete series')}}
                        </x-button>
                    </div>
                    <div class="p-2 m-2 w-full flex justify-center md:w-auto md:p-0 md:m-0">

                            <x-button @click="popupdiv = ! popupdiv" class="bg-green-700 rounded-l-2xl m-2 rounded-r-2xl">
                                {{__('add episode')}}
                            </x-button>

                </div>
                </div>
            @endcan

        </div>
    </div>



</div>
     <div >
    <div  x-show="popupdiv"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class="bg-black bg-opacity-30 h-screen w-full z-20 fixed top-0 left-0 bottom-0 right-0 flex items-center justify-center"
            style="display: none;"
            >
        <div class="md:w-8/12 w-full h-auto p-4   bg-white m-auto ">

            <livewire:add-episode :series="$series->id">
        </div>
    </div>
    </div>
</div>
