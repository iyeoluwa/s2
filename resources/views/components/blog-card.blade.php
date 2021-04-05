@props(['article'=>$article])

<div class=" bg-white shadow-sm">
{{--    this is the image component --}}
    <div class="w-full h-48 relative">
{{--        this is the image tag--}}
        <img src="{{asset($article->cover_image)}}" rel="" class="absolute bg-gray-400 top-0 bottom-0 left-0 right-0"/>
    </div>
{{--    this is the word section --}}
    <div class="w-full h-auto p-4 ">
{{--        this is the title section --}}
        <div class="w-full p-1 justify-center flex text-gray-700 font-semibold text-md">
             <a class="underline" href="{{route('blog.article',[$article->id])}}">
                {{$article->title}}
            </a>
        </div>
{{--        this is the tags section --}}
        <div class="w-full h-auto w-full overflow-hidden p-1">

        </div>
{{--        this is the authur section--}}
        <div class="w-full p-1 flex flex-row items-center">
            <div class="w-10 h-10 bg-gray-400 rounded-full"></div>
            <div class="text-gray-400 flex ml-5">{{$article->user->name}}</div>
        </div>
    </div>
</div>
