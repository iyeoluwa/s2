@props(['article'=>$article])

<div class="@can('delete',$article)lg:h-72 h-72 @endcan border border-gray-200 shadow-sm">
    <div class="w-full h-48 relative">
        <img class="absolute left-0 right-0 top-0 bottom-0 w-full h-full" src="{{asset($article->cover_image)}}">
    </div>
    <div class="w-full p-1 text-sm lg:text-lg flex flex-col justify-center items-center text-middle lg:tracking-wide">
        <a href="{{route('blog.article',[$article->id])}}">
            {{$article->title}}
        </a>
        @can('delete',$article)
            <div class="w-full p-2 flex justify-between">
                <form method="GET" action="{{route('admin.article.edit',[$article->id])}}">
                    @csrf
                    <x-button class="bg-gray-400 text-black">
                        {{__('Edit')}}
                    </x-button>
                </form>

                <form method="POST" action="{{route('admin.article.destroy',[$article->id])}}">
                    @csrf
                    @method('DELETE')
                    <x-button class="bg-red-600">
                        {{__('Delete')}}
                    </x-button>
                </form>
            </div>
        @endcan
    </div>

</div>
