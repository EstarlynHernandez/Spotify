<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>

<body>
    <section class='bg-black w-screen max-h-min h-screen overflow-scroll'>
        <header>
            <div class="fixed bottom-0">
                <div id="player"
                    class='relative w-96 p-2 mx-auto bg-green-700 rounded flex justify-between items-center'>
                    <div class='absolute block bg-slate-400 w-full h-0.5 bottom-0 right-0'></div>
                    <div class='absolute block bg-white w-1/2 h-0.5 bottom-0 left-0'></div>
                    <div class="flex gap-2">
                        <picture>
                            <img class='max-h-10 rounded' src="imgs/1.jpeg" alt="Song Image">
                        </picture>
                        <div>
                            <h4 class="text-sm text-white font-bold">Song Name</h4>
                            <p class="text-sm text-white font-thin">Artist</p>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <picture class='w-max flex justify-center items-center flex-col'>
                            <img class='w-7' src="icons/heart.svg" alt="setings">
                        </picture>
                        <picture class='w-max flex justify-center items-center flex-col'>
                            <img class='w-8' src="icons/pause.svg" alt="setings">
                        </picture>
                    </div>
                </div>
                <nav
                    class='bg-gradient-to-t from-black from-75% to-black/70 w-screen p-2 place-items-center grid grid-cols-4'>
                    <picture
                        class='h-16 w-max flex justify-center items-center flex-col active:opacity-70 transition-all duration-200'>
                        <img class='w-6' src="icons/home<?= $page == 'home' ? '_full' : '' ?>.svg" alt="setings">
                        <a href="{{ route('home') }}" class='text-white text-xs font-thin pt-2'>Home</a>
                    </picture>
                    <picture
                        class='h-16 w-max flex justify-center items-center flex-col active:opacity-70 transition-all duration-200'>
                        <img class='w-6'
                            src="icons/search{{ $page == 'search' ? '_full' : '' }}.svg"
                            alt="setings">
                        <a href="{{ route('search') }}" class='text-white text-xs font-thin pt-2'>Search</a>
                    </picture>
                    <picture
                        class='h-16 w-max flex justify-center items-center flex-col active:opacity-70 transition-all duration-200'>
                        <img class='w-6' src="icons/lib.svg" alt="setings">
                        <p class='text-white text-xs font-thin pt-2'>Your Library</p>
                    </picture>
                    <picture
                        class='h-16 w-max flex justify-center items-center flex-col active:opacity-70 transition-all duration-200'>
                        <img class='w-6' src="icons/app.svg" alt="setings">
                        <a href="{{ route('getapp') }}" class='text-white text-xs font-thin pt-2'>Get App</a>
                    </picture>
                </nav>
            </div>
        </header>
        @yield('content')
    </section>

    {{-- Play full --}}
    <section
        class="w-screen h-screen bg-gradient-to-t from-red-950 to-red-600 fixed bottom-0 right-0 px-4 py-6 flex flex-col justify-between hidden">
        <div class="flex justify-between">
            <picture>
                <img class="w-6" src="icons/down.svg" alt="Down">
            </picture>
            <p class="text-white text-base">PlayList Title</p>
            <picture>
                <img class="w-6" src="icons/point.svg" alt="Down">
            </picture>
        </div>
        <picture>
            <img src="imgs/1.jpeg" alt="">
        </picture>
        {{-- controllers and info --}}
        <div>
            <div class="flex justify-between items-center mb-10">
                <div>
                    <h3 class="text-white text-2xl">Song Title</h3>
                    <p class="text-gray-100/70">Artist</p>
                </div>
                <picture>
                    <img class="w-8" src="icons/heart.svg" alt="Like">
                </picture>
            </div>
            <div class="w-full flex h-1 bg-white/50 rounded">
                <div class="block h-full w-2/3 bg-white"></div>
                <div class="block h-5 w-5 rounded-full bg-white relative bottom-2"></div>
            </div>
            <div class="flex justify-between mt-12 items-center">
                <picture>
                    <img class="w-8" src="icons/random.svg" alt="Ramdom">
                </picture>
                <picture>
                    <img class="w-8" src="icons/back.svg" alt="Ramdom">
                </picture>
                <picture>
                    <img class="w-12" src="icons/play_circle.svg" alt="Ramdom">
                </picture>
                <picture>
                    <img class="w-8" src="icons/next.svg" alt="Ramdom">
                </picture>
                <picture>
                    <img class="w-8" src="icons/repeat.svg" alt="Ramdom">
                </picture>
            </div>
            <div class="flex justify-between mt-5">
                <picture>
                    <img class="w-5" src="icons/case.svg" alt="Ramdom">
                </picture>
                <picture>
                    <img class="w-5" src="icons/share.svg" alt="Ramdom">
                </picture>
            </div>
        </div>
    </section>
</body>

</html>
