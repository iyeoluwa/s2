@props(['user'=>$user])
<div class=" max-w-7xl m-auto w-full px-4 lg:pt-20 py-5 flex flex-col align-middle justify-center h-auto">

             <div class="flex flex-col h-auto bg-white md:w-8/12 w-full mb-24">
                <div class="w-full md:p-2 md:px-6 md:h-auto md:h-20 h-auto flex justify-center p-2 px-2 mb-10 md:justify-start">
                    <div class="capitalize font-futura flex align-middle items-center tracking-wide leading-4 text-xl text-center md:text-left">article author</div>
                </div>
                <div class="w-full md:h-40 h-auto p-4 flex-wrap flex flex-col md:flex-row md:justify-start justify-center items-center md:items-start">
                    @if($user->name == 'Adedayo Fajimi')
                        <div class="w-32 h-32 md:mr-4 "><img class="rounded-full w-full h-full " src="{{asset('img/IMG_4180 (5).jpg')}}" rel="{{'An Image Of '.$user->name}}" /> </div>
                    @else
                        <div class="w-32 h-32 md:mr-4  rounded-full bg-gray-200"></div>
                    @endif

                    <div class="md:w-6/12 w-full md:p-2 md:h-full h-20 p-2 mr-2 uppercase align-middle justify-center md:justify-start items-center md:text-left  font-futura flex align-middle items-center tracking-wide leading-4 ">{{$user->name}}</div>
                    <div class="w-full md:w-auto h-auto md:h-full bg-white flex align-middle items-center md:ml-4  md:pl-4 justify-center">
                        <a href="#" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Check profile</a>
{{--                        <a href="{{route('profile.show',[$user->id])}}" class="bg-white flex items-center text-green-600 rounded-lg font-semibold py-2 px-4 border border-green-600 h-12 capitalize outline-none">Check profile</a>--}}
                    </div>
                </div>
            </div>

</div>
