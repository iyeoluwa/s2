
<x-app-layout>
    @section('loadpage')
     <meta name="turbolinks-visit-control" content="reload">
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <x-article-form title="add new article">
                    <div class="w-full h-auto bg-transparent flex flex-col">
                         <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form method="POST" action="{{route('admin.article.new')}}" enctype="multipart/form-data">
                            @csrf
{{--                            this is for the picture upload--}}
                             <div>
                                <x-label for="image" :value="'Article Picture'" />
                                <x-input id="image" class="rounded-none my-4" name="image" type="file" required/>
                            </div>


{{--                            this is for article input--}}
                            <div>
                                <x-label for="title" :value="'Article Title'" />
                                <x-input id="title" class="w-full rounded-none my-4" name="title" type="text" required autofocus/>
                            </div>

{{--                            this is for the summary input --}}
                            <div>
                                <x-label for="summary" :value="'Article Summary'" />
                                <x-text-area id="summary" class="w-full my-4 h-28" style="resize: none;" name="summary" required >
                                    {{old('summary')}}
                                </x-text-area>
                            </div>
{{--                            this is for the tags input --}}
                             <div>
                                <x-label for="title" :value="'Article Tags'" />
                                <x-input id="taginput" name="tags" class="w-full rounded-none my-4"  type="text" required autofocus/>
                            </div>

{{--                            this is the article content input--}}

                             <div>
                                <x-label for="title" :value="'Article Content'" />
                            <div class="toolbar w-full h-auto flex flex-row p-2 mb-3 justify-center border border-gray-200 bg-gray-100 sticky top-0" id="trix-toolbar">
                                 <button type="button" data-format="heading1" class="w-10 h-auto mx-2"><i class="lnr lnr-text-size"></i> </button>
                                <button type="button" data-format="bold"  class="w-10 h-auto mx-2"><i class="lnr lnr-bold"></i></button>
                                <button type="button" data-format="italic"  class="w-10 h-auto mx-2"><i class="lnr lnr-italic"></i> </button>
                                <button type="button" data-format="link"  class="w-10 h-auto mx-2"><i class="lnr lnr-link"></i> </button>
                                <button type="button" data-format="quote"  class="w-10 h-auto mx-2"><i class="lnr lnr-indent-increase"></i> </button>

                            </div>
                                <input id="x" type="hidden" name="contents" value="{{old('contents')}}">
                         <trix-editor id="trix-editor" class="trix-content w-full border-0 outline-none" placeholder="Tell your story..." input="x" toolbar="trix-toolbar"></trix-editor>                            </div>

                         <x-button class="ml-3">
                            {{ __('Publish Article ') }}
                        </x-button>
                        </form>
                    </div>
                  </x-article-form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
