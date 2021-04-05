<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}


<div class=" max-w-7xl m-auto w-full px-4 lg:pt-20 py-5 flex flex-col align-middle justify-center h-auto">
        <div class="w-full h-auto flex flex-col py-5 bg-white flex-wrap">
             <div class="capitalize flex align-middle items-center tracking-wide leading-4 text-2xl py-2 px-4 md:px-0">
                            Type your comment
             </div>
             <form wire:submit.prevent="submitComment({{$article->id}})" class="flex flex-col justify-start py-2">
                 @csrf
                 <div class="w-full md:w-8/12 h-auto py-2 flex flex-col flex-wrap px-4 md:px-0">
                     <textarea placeholder="Type your comment..." style="resize:none" name="comment" wire:model="comment" class="w-full h-40 border-2 border-gray-400 flex p-2 my-3"></textarea>
                     @if(auth()->user())

                     <x-button class="rounded-none" >
                      {{__('submit')}}
                  </x-button>
                         @else
                         <a href="{{route('login')}}" class="w-8/12 md:w-4/12 text-center flex items-center justify-center h-10 bg-black text-white p-2 my-1 md:my-3 tracking-wide leading-4">Login To Comment</a>
                         @endif
                 </div>
             </form>
             <div class="w-full md:w-8/12 h-auto py-2 flex flex-col flex-wrap px-4 md:px-0">

                    @if($article->comments)
                        <div class="capitalize flex align-middle items-center tracking-wide leading-4 text-2xl py-2 px-4 md:px-0">Comments</div>
                        @foreach($article->comments as $comment)
                             <div class="w-full h-auto p-4 border-2 border-gray-200 my-2">
                                <div class="font-semibold text-lg mb-4 ">{{$comment->commentator->name}}</div>
                                <p class="">
                                    {{$comment->comment}}
                                </p>
                        {{--        <a href="" id="reply">reply</a>--}}
                        {{--        <form method="post" action="{{route('reply.add')}}">--}}
                        {{--            @csrf--}}
                        {{--            <div class="">--}}
                        {{--                <input type="text" name="comment">--}}
                        {{--                <input type="hidden" name="post_id" value="{{$post_id}}">--}}
                        {{--                <input type="hidden" name="comment_id" value="{{$comment->id}}">--}}
                        {{--            </div>--}}
                        {{--            <div class="">--}}
                        {{--                <input type="submit" class="" value="Reply"/>--}}
                        {{--            </div>--}}
                        {{--        </form>--}}

                        {{--                     @include('post.partials.replies',['comments'=>$post->comments,'post_id'=>$post->id])--}}
                            </div>
                        @endforeach
                    @endif
             </div>
        </div>
    </div>

</div>
