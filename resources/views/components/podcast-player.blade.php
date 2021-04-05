




<div class="" id="player" data-turbolinks-permanent>
    <div style="background: rgba(16,24,32,.95);"  class="flex w-full border-t border-gray-800 shadow h-20 fixed bottom-0 left-0 right-0 z-20">
        <div class="flex w-full">
            <div class="w-24 h-full podcast-name-info flex">
{{--                this is where the image will be --}}
                <div class="w-20 h-20 flex bg-gray-200 relative">
                    <img id="seriesArt" src=""/>
                </div>
            </div>
            <div class="w-3/12 flex px-4 h-full items-center justify-center">
                <button class="mx-2 h-10 w-10 rounded-full items-center justify-center" title="seek back 15 seconds" style="background: rgba(16,24,32,.5) 50% no-repeat;background-image: url({{asset('svg/seek-back-15.svg')}})"></button>
                <button class="mx-2 w-16 h-16 rounded-full items-center justify-center" id="playbutton" title="play episode" style="background: rgba(16,24,32,.5) 50% no-repeat;background-image: url({{asset('svg/play-player.svg')}});background-size: 18px;"></button>
                <button class="mx-2 h-10 w-10 rounded-full items-center justify-center" title="seek back 15 seconds" style="background: rgba(16,24,32,.5) 50% no-repeat;background-image: url({{asset('svg/seek-forward-15.svg')}})"></button>
            </div>
{{--            podcast player slider--}}
            <div class="flex flex-col text-white w-10/12 pt-1">
{{--above the range slider--}}

                <div class="w-full inline text-sm text-gray-500 capitalize">
                    <span class="" id="player-now-playing">prayer and fasting</span>
                </div>
                <div class="w-full h-6">

                </div>
                <div class="" id="range_slider-below episode-title">
                    <div class="font-bold text-md inline" id="js-player-title">testing the background queues</div>
                </div>
            </div>
        </div>
    </div>

{{--    <script>--}}

{{--    var elems = ['pressToPause','pressToPlay','playbutton','skip','rewind','seriesArt','podcastTitle','seriesArt','player-now-playing','js-player-title'];--}}

{{--    elems.forEach(function(elm) {--}}
{{--      window[elm] = document.getElementById(elm);--}}
{{--    });--}}


{{--    var Player = function(id){--}}
{{--        this.index = 0;--}}





{{--    };--}}
{{--    Player.prototype = {--}}
{{--        play:function(episode){--}}

{{--            var sound;--}}
{{--            var data = episode;--}}

{{--         if (data.howl){--}}
{{--             sound = data.howl--}}
{{--         }else{--}}
{{--             //let us fetch the music--}}
{{--              loadSound =  axios.get('/series/load/'+data+'').then(function(response){--}}
{{--                    var episode = response.data[0];--}}

{{--               sound  = data.howl = new Howl({--}}
{{--                        src:[''+episode.audio_stream+' '],--}}
{{--                        html5:true,--}}
{{--                        onplay: function(){--}}
{{--                            console.log('playing')--}}
{{--                        },--}}
{{--                        onload:function () {--}}
{{--                            console.log('loading');--}}
{{--                        },--}}
{{--                        onpause:function(){--}}
{{--                            console.log('paused!!!')--}}
{{--                        },--}}
{{--                        onstop:function(){--}}
{{--                            console.log('stoped!!!!!')--}}
{{--                        },--}}
{{--                        onseek:function(){--}}
{{--                            console.log('seeking !!!!!')--}}
{{--                        }--}}
{{--                    });--}}
{{--                               //begin playing the sound....--}}

{{--                            playid = sound.play();--}}

{{--                            console.log(playid)--}}

{{--                                //update the track display......--}}

{{--                                //show the pause button--}}

{{--                                if(sound.state() === 'loaded'){--}}
{{--                                    //set the button to show pause--}}
{{--                                }else{--}}
{{--                                    //set the button to loading--}}
{{--                                }--}}
{{--                                    })--}}



{{--                                    }--}}



{{--        },--}}
{{--        pause:function(){--}}
{{--             var self = this;--}}

{{--            // Get the Howl we want to manipulate.--}}
{{--            var sound = self.episode.howl;--}}

{{--            // Puase the sound.--}}
{{--            sound.pause();--}}

{{--            // Show the play button.--}}
{{--            // playBtn.style.display = 'block';--}}
{{--            // pauseBtn.style.display = 'none';--}}
{{--        }--}}


{{--    }--}}

{{--    // function startPlaying(id){--}}
{{--    //     var self = id;--}}
{{--    // //let us fetch the music--}}
{{--    // axios.get('/series/load/'+self+'').then(function(response){--}}
{{--    //     let episode = response.data[0];--}}
{{--    //     var player = new Player(episode);--}}
{{--    //--}}
{{--    //     player.play();--}}
{{--    // })--}}
{{--    // }--}}


{{--    var player = new Player()--}}

{{--    function play($id){--}}
{{--        player.play($id);--}}
{{--    }--}}
{{--    pressToPlay.addEventListener('click',function(e){--}}
{{--        e.preventDefault();// prevent the default from happening--}}
{{--        var input = this.querySelector('input');--}}
{{--        inputValue  = input.value;--}}
{{--        player.play(input.value);--}}
{{--        this.style.display = 'none';--}}
{{--        getPause = getNextSibling(this,'#pressToPause')--}}
{{--        getPause.style.display = 'flex';--}}

{{--    });--}}

{{--    pressToPause.addEventListener('click',function(e){--}}
{{--        e.preventDefault();--}}
{{--        player.pause();--}}
{{--        this.style.display = 'none'--}}
{{--        getPlay = getPrevSibling(this,'#pressToPlay')--}}
{{--        getPlay.style.display = 'flex';--}}
{{--    })--}}

{{--    function getNextSibling(elem,selector){--}}
{{--        var sibling  = elem.nextElementSibling--}}
{{--        if (!selector) return sibling--}}

{{--        while(sibling){--}}
{{--            if(sibling.matches(selector)) return sibling;--}}
{{--            sibling  = sibling.nextElementSibling;--}}
{{--        }--}}
{{--    }--}}

{{--    function getPrevSibling(elem,selector){--}}
{{--        var sibling  = elem.previousElementSibling--}}
{{--        if (!selector) return sibling--}}

{{--        while(sibling){--}}
{{--            if(sibling.matches(selector)) return sibling;--}}
{{--            sibling  = sibling.previousElementSibling;--}}
{{--        }--}}
{{--    }--}}


{{--    // startPlaying(25)--}}
{{--  //    new Player(episode);--}}
{{--  //--}}
{{--  //   playbutton.addEventListener('click', function() {--}}
{{--  // player.play();--}}
{{--// });--}}
{{--    //document.querySelectorAll('#play')--}}

{{--</script>--}}

</div>

