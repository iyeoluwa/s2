@props(['tags'=>$tags])
<div class=" max-w-7xl md:m-auto w-full px-4 py-5 flex flex-col align-middle justify-center h-auto">
    <div class="w-full h-auto p-2 border-t border-b border-gray-200 md:my-10 flex flex-col">

        <div class="w-full height-auto flex flex-wrap">
            @foreach($tags as $tag)
                <a href="{{route('blog.tags.specific',[$tag->slug])}}" class="w-auto p-2 h-auto bg-gray-100 text-black font-semibold m-2 rounded-xl ">{{$tag->slug}}</a>
            @endforeach
        </div>
    </div>
</div>
