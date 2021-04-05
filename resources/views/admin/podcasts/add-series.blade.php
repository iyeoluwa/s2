{{--this is the standard application layout--}}
<x-app-layout>
@section('loadpage')
     <meta name="turbolinks-visit-control" content="reload">
    @endsection
{{--    this is the haeder component --}}
    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{route('admin.podcast.home')}}" > {{ __('Podcasts')}}</a>  <a href="{{route('admin.podcast.home')}}" class="text-gray-900 text-sm" > > Podcast Series</a>
            <span class="text-gray-300 text-sm" > > New Series</span>
        </h2>
    </x-slot>

{{--    this is the standard body --}}

    <x-standard-body>

{{--this is the small standard heading --}}
        <x-small-headings class="capitalize flex justify-between">
            <span>New series</span>
        </x-small-headings>

{{--        this is the  series form --}}

        @livewire('add-series')



    </x-standard-body>

</x-app-layout>
