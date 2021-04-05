

<x-blog-layout>
    @section('title',' Article '. $article->title)
    @section('tag')
        <meta property="og:site_name" content="A More Sure Word | Blog" />
        <meta property=“og:title" content="{{$article->title}}" />
        <meta name="twitter:title" content="{{$article->title}}">
        <meta property="og:description" content="{{$article->summary}}" />
        <meta property="og:url" content="{{url()->full()}}" />
        <meta property="og:type" content="article" />
        <meta property="article:publisher" content="https://www.amoresureword.com" />
        <meta property="article:section" content="gospel" />
        <meta property="article:tag" content="gospel" />
        <meta property="og:image" content="{{$article->cover_image}}" />
        <meta property="og:image:secure_url" content="{{$article->cover_image}}" />
        <meta property="og:image:width" content="1280" />
        <meta property="og:image:height" content="640" />
        <meta property="twitter:card" content="summary_large_image" />
        <meta property="twitter:image" content="{{$article->cover_image}}" />
@endsection
        <x-slot name="header">


        <nav  x-data="{ open: false }" class="bg-white border-b border-gray-100">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">

                         <span class="flex items-center">
                            {{__('sureword blog')}}
                        </span>

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

    <x-article-main-parent>

        <x-article-image-main :article="$article" :count="$count"/>

        <x-article-profile-blog :user="$article->user"/>

        <x-article-tags :tags="$tags"/>

        <livewire:article-comments :article="$article"/>

{{--        this is for recommendation--}}
        <x-article-recommendation :recommendations="$recommendations"/>
    </x-article-main-parent>







</x-blog-layout>
