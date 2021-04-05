<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{route('admin.article.home')}}" > {{ __('Articles')}}</a>  <span class="text-gray-300 text-sm" > > All Articles</span>
        </h2>
    </x-slot>

    <x-standard-body>


        {{--this is the small standard heading --}}
        <x-small-headings class="capitalize flex justify-between">
            <span>Your Articles</span>
            <a href="{{route('admin.article.new')}}">
                <x-button>
                    {{__('Add new article')}}
                </x-button>
            </a>
        </x-small-headings>


        <x-article-card-parent>
            @foreach($articles as $article)

                <x-article-card :article="$article" />

            @endforeach

        </x-article-card-parent>

    </x-standard-body>

</x-app-layout>



