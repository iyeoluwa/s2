@props(['series'=>$series])

<div x-data="{ popupdiv: false }" @click.away="popupdiv = false" @close.stop="popupdiv = false">
<div {{$attributes->merge(['class'=>'w-full flex py-2 flex-row m-6'])}} >
    <div class="w-full h-auto flex flex-col lg:flex-row px-48 p-16">

        <div class="lg:justify-start justify-center flex flex-col w-full lg:w-6/12">
            <div class="text-xl  lg:text-3xl text-white  tracking-wide p-2 leading-8 font-semibold lg:text-left text-center">{{$series->title}}</div>
            <div class="text-md text-gray-100  lg:text-left text-center p-2 ">{{$series->speakers}}</div>
        </div>


        <div class="w-full md:w-auto md:w-6/12 justify-center lg:justify-end flex my-2 ">
            <img src="{{asset($series->image)}}" rel="{{$series->title .' image' }}" class="w-96 h-96">
        </div>

    </div>



</div>

</div>
