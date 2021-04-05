<x-blog-layout>
        @section('title',' Topics ')
        <x-slot name="header">


        <nav  x-data="{ open: false }" class="bg-white border-b border-gray-100">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                             <span class="flex items-center">
                                {{__('sureword blog')}}
                            </span>
                        </div>


                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link :href="route('blog.home')" :active="request()->routeIs('blog.home')">
                                {{ 'Articles' }}
                            </x-nav-link>
                             <x-nav-link :href="route('tag.tags')" :active="request()->routeIs('tag.tags')">
                                {{ 'Topics' }}
                            </x-nav-link>

                        </div>
                    </div>

                    <!-- Settings Dropdown -->


                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                     <x-responsive-nav-link :href="route('blog.home')" :active="request()->routeIs('blog.home')">
                        {{ 'Articles' }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('tag.tags')" :active="request()->routeIs('tag.tags')">
                        {{ 'Topics' }}
                    </x-responsive-nav-link>

                </div>

            </div>
        </nav>
        </x-slot>

    <x-blog-body>
         <div class=" w-full top-16 sticky  h-auto p-4 mb-5  mt-5  bg-white shadow">
         <div class="capitalize md:text-xl md:text-2xl tracking-wide text-gray-800">all topics</div>
     </div>
        <x-blog-card-parent>


        {{--            this is the loop to that will show all the articles--}}


@foreach($tags as $tag)

                <div class="bg-white shadow overflow-hidden">
                    <div class="">
                        <div class="p-8 md:h-auto  overflow-hidden block">
                            <a href="{{route('blog.tags.specific',[$tag->slug])}}" class="block mt-1 text-lg  leading-tight font-medium text-black hover:underline">{{$tag->name}}</a>
                        </div>
                    </div>

                </div>

@endforeach

        </x-blog-card-parent>

    </x-blog-body>







</x-blog-layout>


