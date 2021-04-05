@props(['article'=>$article,'count'=>$count])
<div class="max-w-7xl m-auto">
    <div class="w-full h-auto">
        {{Breadcrumbs::render('article',$article->id)}}
        <div class="w-full h-auto md:my-2 mx-auto">

            <img class="object-cover w-full m-auto block" src="{{asset($article->cover_image)}}">
        </div>

        <div class="w-full px-4 lg:pt-20 py-5 flex flex-col align-middle justify-center h-auto">
            <div class="relative w-full h-auto">
                <div class="w-full flex flex-row my-6 justify-between lg:bg-gray-100 px-2 py-4 md:bg-white">
                    <small class="md:text-lg capitalize "><li class="fa fa-eye inline-flex mr-2"></li>{{$count. ' views'}}</small>
                    <small class="md:text-lg capitalize "><li class="fa fa-clock inline-flex mr-2"></li>{{read_time($article->content)}}</small>

                </div>
                <div class="trix-content">
                     <h1>{{$article->title}}</h1>

                    {!! $article->content!!}
                </div>
                {!!Share::page(url()->full(),$article->title,['class'=>'h-auto w-16 justify-center md:w-20 md:ml-6 md:m-4 flex text-3xl'],'<ul class="md:mt-32 md:fixed top-0 left-0 md:w-32 h-auto flex  w-full justify-center md:flex-col">','</ul>')->facebook()->twitter($article->summary)->linkedin($article->summary)->whatsapp()->telegram($article->summary)!!}

            </div>
        </div>
    </div>

</div>



