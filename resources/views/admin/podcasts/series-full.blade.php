{{--this is the standard application layout--}}
<x-app-layout >
@section('loadpage')
     <meta name="turbolinks-visit-control" content="reload">
    @endsection
{{--    this is the haeder component --}}
    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{route('admin.podcast.home')}}" > {{ __('Podcasts')}}</a> <a href="{{route('admin.podcast.home')}}" class="text-gray-900 text-sm" > > Podcast Series</a> <span class="text-gray-300 text-sm" > > {{$series->title}}</span>

        </h2>
    </x-slot>

{{--    this is the standard body --}}

    <x-standard-body>


{{--    this will show all the episodes in a series--}}
        <x-series-head-episodes :series="$series"/>


    </x-standard-body>

</x-app-layout>
