<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('icons/play.svg') }}" type="image/x-icon">
</head>

<body class="overflow-hidden">
    <audio id="song" src="{{ asset('song/10.mp3') }}"></audio>
    <section class='bg-black w-screen max-h-min h-screen overflow-scroll sm:flex sm:overflow-hidden'>
        <header>
            <div class="fixed sm:static bottom-0 z-30 sm:p-1 sm:h-full sm:pb-16 sm:flex sm:flex-col sm:gap-1">
                {{-- mini player --}}
                <div id="miniPlayer"
                    class='relative w-11/12 p-4 mx-auto bg-green-700 rounded flex justify-between items-center hidden sm:w-full sm:rounded-none sm:bg-black sm:absolute sm:bottom-0 sm:flex'>
                    <div class='hidden sm:flex absolute top-0 pt-1 w-11/12 left-0 right-0 m-auto sm:w-1/2 justify-center gap-5'>
                        <img class="w-8 opacity-40" src="{{asset('icons/random.svg')}}" alt="">
                        <img class="w-8 prevSong" src="{{asset('icons/back.svg')}}" alt="">
                        <img class="w-10 playPause" src="{{asset('icons/play_circle.svg')}}" alt="">
                        <img class="w-8 nextSong" src="{{asset('icons/next.svg')}}" alt="">
                        <img class="w-8 opacity-40" src="{{asset('icons/repeat.svg')}}" alt="">
                    </div>
                    <div class='absolute bottom-0 w-11/12 left-0 right-0 m-auto sm:w-1/2 sm:bottom-1/4'>
                        <div class='absolute block bg-white/20 w-full h-0.5 bottom-0 right-0'></div>
                        <div class='absolute block bg-white h-0.5 bottom-0 left-0 songPosition'></div>
                    </div>
                    <div class="flex gap-2">
                        <picture>
                            <img class='max-h-14 rounded' src="{{ asset('imgs/1.webp') }}" alt="Song Image">
                        </picture>
                        <div>
                            <h4 class="text-xs text-white font-bold songTitle">Song Name</h4>
                            <p class="text-xs text-white font-thin songArtists">Artist</p>
                        </div>
                    </div>
                    <div class="flex gap-2 sm:hidden">
                        <picture class='w-max flex justify-center items-center flex-col'>
                            <img class='w-7 songLike' src="{{ asset('icons/heart.svg') }}" alt="setings">
                        </picture>
                        <picture class='w-max flex justify-center items-center flex-col'>
                            <img class='w-7 playPause' src="{{ asset('icons/play.svg') }}" alt="setings">
                        </picture>
                    </div>
                </div>
                {{-- Mobile nav --}}
                <nav
                    class='bg-gradient-to-t from-black from-75% to-black/70 w-screen p-2 place-items-center grid grid-cols-4 sm:w-64 sm:flex sm:flex-col sm:items-start sm:from-gray-900/50 sm:to-gray-900/50 rounded sm:grid-cols-2 sm:gap-2 sm:bg-gray-600/30 sm:h-fit'>
                    <a href="{{ route('home') }}"
                        class='h-16 w-max flex justify-center items-center flex-col active:opacity-70 transition-all duration-200 sm:flex-row sm:h-8 sm:gap-5 sm:justify-start'>
                        <img class='w-6 sm:w-6'
                            src="{{ asset(isset($page) && $page == 'home' ? 'icons/home_full.svg' : 'icons/home.svg') }}"
                            alt="setings">
                        <p class='text-white text-base font-thin pt-2 sm:font-bold sm:text-xl'>Home</p>
                    </a>
                    <a href="{{ route('search') }}"
                        class='h-16 w-max flex justify-center items-center flex-col active:opacity-70 transition-all duration-200 sm:flex-row sm:h-16 sm:gap-5 sm:justify-start'>
                        <img class='w-8 sm:w-6'
                            src="{{ asset(isset($page) && $page == 'search' ? 'icons/search_full.svg' : 'icons/search.svg') }}"
                            alt="setings">
                        <p class='text-white text-base font-thin pt-2 sm:font-bold sm:tex:xl'>Search</p>
                    </a>
                    <picture
                        class='h-16 w-max flex justify-center items-center flex-col active:opacity-70 transition-all duration-200 sm:hidden'>
                        <img class='w-8' src="{{ asset('icons/lib.svg') }}" alt="setings">
                        <p class='text-white text-xs font-thin pt-2'>Your Library</p>
                    </picture>
                    <a href="{{ route('getapp') }}"
                        class='h-16 w-max flex justify-center items-center flex-col active:opacity-70 transition-all duration-200 sm:hidden'>
                        <img class='w-6' src="{{ asset('icons/app.svg') }}" alt="setings">
                        <p class='text-white text-xs font-thin pt-2'>Get App</p>
                    </a>
                </nav>
                <div class="hidden sm:flex flex-col gap-2 sm:h-full sm:w-64 sm:bg-gray-600/30 rounded p-2">
                    <div class="flex justify-between items-center px-2">
                        <div
                            class="flex gap-2 p-2 items-center opacity-50 hover:opacity-100 cursor-pointer transition-all duration-300">
                            <img class='w-3' src="{{ asset('icons/lib.svg') }}" alt="Lib">
                            <p class="text-white text-base">Your Library</p>
                        </div>
                        <p class="text-white/50 text-2xl hover:text-white cursor-pointer transition-all duration-300">+
                        </p>
                    </div>
                    <div class="bg-white/10 h-fit w-full p-4 rounded-xl flex flex-col gap-1">
                        <h3 class="text-white text-base font-bold">Make Your Playlist</h3>
                        <p class="text-white/50 text-base">It's easy</p>
                        <p class="bg-white text-xs font-bold text-center py-2 px-4 mt-4 w-fit rounded-full">Make playlist
                        </p>
                    </div>
                    <div class="bg-white/10 h-fit w-full p-4 rounded-xl flex flex-col gap-1">
                        <h3 class="text-white text-base font-bold">Search a podcast</h3>
                        <p class="text-white/50 text-base">It's easy</p>
                        <p class="bg-white text-xs font-bold text-center py-2 px-4 mt-4 w-fit rounded-full">Browser
                            podcast</p>
                    </div>
                </div>
            </div>
        </header>
        <div class="py-1 m-0 relative overflow-auto sm:py-0 sm:p-2 sm:mt-1 rounded sm:mb-24 sm:w-full">
            <div class='sm:w-full sm:bg-gray-600/30'>
                <div style="background-color: #171A1E" class="hidden sm:flex sm:w-full h-20 p-2 items-center sticky top-0 justify-between z-30">
                    <div class="flex gap-1 items-center">
                        <img class="w-8 h-8 p-1 opacity-50 bg-black/30 rounded-full"
                            src="{{ asset('icons/return.svg') }}" alt="">
                        <img class="w-8 h-8 p-1 opacity-50 bg-black/30 rounded-full rotate-180"
                            src="{{ asset('icons/return.svg') }}" alt="">
                        <div type="text" class="rounded-full bg-white/10 w-72 flex items-center px-2 py-1 gap-1">
                            <img class="w-10 opacity-50 p-2" src="{{asset('icons/search.svg')}}" alt="">
                            <input placeholder="What you like to listen?" type="text" class='outline-none bg-transparent w-full h-11/12 text-white text-base'> 
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <a class="text-white/50 hover:text-white cursor-pointer text-xl">Sign In</a>
                        <a class="text-xl bg-white py-1 rounded-full px-3">Log In</a>
                    </div>
                </div>
                @yield('content')
            </div>
        </div>
    </section>

    {{-- Play full --}}
    <section id="fullPlayer"
        class="w-screen bg-gradient-to-t from-red-950 to-red-600 fixed -bottom-12 right-0 px-4 py-6 flex flex-col justify-between z-50 h-0 transition-all sm:hidden">
        <div id="headerPlayer" class="flex justify-between">
            <picture>
                <img class="w-6" src="{{ asset('icons/down.svg') }}" alt="Down">
            </picture>
            <p class="text-white text-base">PlayList Title</p>
            <picture>
                <img class="w-6" src="{{ asset('icons/point.svg') }}" alt="Down">
            </picture>
        </div>
        <picture>
            <img src="{{ asset('imgs/1.webp') }}" alt="">
        </picture>
        {{-- controllers and info --}}
        <div>
            <div class="flex justify-between items-center mb-10">
                <div>
                    <h3 class="text-white text-2xl songTitle">Song Title</h3>
                    <p class="text-gray-100/70 songArtists">Artist</p>
                </div>
                <picture>
                    <img class="w-8 songLike" src="{{ asset('icons/heart.svg') }}" alt="Like">
                </picture>
            </div>
            <div class="w-full flex h-1 bg-white/50 rounded">
                <div style="width: 0%" class="block h-full w-2/3 bg-white songPosition"></div>
                <div class="block h-5 w-5 rounded-full bg-white relative bottom-2"></div>
            </div>

            {{-- audio Controls --}}
            <div class="flex justify-between mt-12 items-center">
                <picture>
                    <img class="w-8" src="{{ asset('icons/random.svg') }}" alt="Ramdom">
                </picture>
                <picture>
                    <img class="w-8 prevSong" src="{{ asset('icons/back.svg') }}" alt="Ramdom">
                </picture>
                <picture>
                    <img class="w-12 playPause" src="{{ asset('icons/play_circle.svg') }}" alt="Ramdom">
                </picture>
                <picture>
                    <img class="w-8 nextSong" src="{{ asset('icons/next.svg') }}" alt="Ramdom">
                </picture>
                <picture>
                    <img class="w-8" src="{{ asset('icons/repeat.svg') }}" alt="Ramdom">
                </picture>
            </div>

            <div class="flex justify-between mt-5">
                <picture>
                    <img class="w-5" src="{{ asset('icons/case.svg') }}" alt="Ramdom">
                </picture>
                <picture>
                    <img class="w-5" src="{{ asset('icons/share.svg') }}" alt="Ramdom">
                </picture>
            </div>
        </div>
    </section>
</body>

</html>
