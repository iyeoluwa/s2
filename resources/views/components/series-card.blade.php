@props(['series'=>$series])


    <a {{$attributes->merge(['href'=>'','class'=>'flex flex-col justify-center outline-none w-36  h-48 md:w-40 md:h-52  m-1 md:m-2'])}}>
        <div  class="relative w-36 h-36 md:w-40 md:h-40">
            <img src="{{asset($series->image)}}" class="w-full h-full bg-gray-400  rounded-md  top-0 bottom-0 left-0 right-0 absolute" rel="{{$series->title.' image'}}"/>
        </div>
        <div class="flex flex-col w-full h-auto mt-1">
            <div class="text-sm font-medium leading-5 text-gray-700">{{$series->title}}</div>
            <div class="text-gray-500 text-sm">{{$series->podcasts->count().' '.Str::Plural('episode',$series->podcasts->count())}}</div>
        </div>
    </a>


