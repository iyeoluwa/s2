<x-podcast-layout>
 <x-slot name="header"></x-slot>

   <div class=" w-full min-h-screen  z-1 overflow-hidden">

            <div class="w-full flex  flex-col top-0">
                <div class="relative w-full min-h-screen">
                    <div class="">
                        <x-series-head-episodes-users :series="$series"/>

                        <x-episodes-users :series="$series->podcasts"/>

                    </div>
                </div>
            </div>
   </div>
</x-podcast-layout>
