
{{--this is the standard application layout--}}
<x-app-layout>
@section('loadpage')
     <meta name="turbolinks-visit-control" content="reload">
    @endsection
{{--    this is the haeder component --}}
    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{route('admin.podcast.home')}}" > {{ __('Podcasts')}}</a>  <span class="text-gray-300 text-sm" > > Podcast Series</span>
        </h2>
    </x-slot>

{{--    this is the standard body --}}

    <x-standard-body>

{{--this is the small standard heading --}}
        <x-small-headings class="capitalize flex justify-between">
            <span>Podcasts series</span>
            <a href="{{route('admin.podcast.series.new')}}">
                <x-button>
                    {{__('Add new series')}}
                </x-button>
            </a>
        </x-small-headings>

{{--        this is the series parent div --}}
        <x-series-parent class="">
            @foreach($series as $series)
                <x-series-card :series="$series" href="{{route('admin.podcasts.series.podcasts.full',[
                    $series->id,
                    $series->title,
])}}"/>
            @endforeach
        </x-series-parent>


    </x-standard-body>

</x-app-layout>
