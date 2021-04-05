<div>

    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

         <div class="relative w-full min-h-screen" style="background: #101820;">
        <div class="w-full flex flex-row h-4 flex-wrap m-6 ">

{{--            this is where we are going to be looping --}}
            @foreach($series as $series)
                <x-series-card-user :series="$series"/>
            @endforeach
        </div>

{{--        this is the section that shows when a series is clicked --}}






                </div>




</div>




