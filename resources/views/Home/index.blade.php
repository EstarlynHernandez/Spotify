@extends('base')
@section('page')
    home
@endsection
@section('title')
    Home
@endsection

@section('content')
    <main class="sm:w-full">
        <picture class='justify-end flex p-6 sm:hidden'>
            <img class='w-6' src="{{ asset('icons/gear.svg') }}" alt="setings">
        </picture>
        @for ($i = 0; $i < 1; $i++)
            <div class="p-6 sm:p-2">
                <h2 class="text-xl text-white font-bold mb-4">{{ fake()->name() }}</h2>
                <div class="flex overflow-scroll sm:overflow-hidden sm:flex-wrap gap-2 items-center">
                    @foreach ($playlists->random(6) as $playlist)
                        <a href="{{ route('playlist.show', ['id' => $playlist->id]) }}"
                            class="flex-none w-40 hover:bg-white/30 p-2 rounded cursor-pointer sm:flex sm:w-48 sm:bg-white/10 sm:gap-2">
                            <picture>
                                <img src="{{ 'imgs/' . random_int(1, 36) . '.webp' }}" alt="Music Image"
                                    class='w-40 rounded sm:w-8'>
                            </picture>
                            <div class="mt-2 sm:mt-0">
                                <p class="text-white font-medium sm:text-xs">{{ substr($playlist->title, 0, 24) }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endfor
        @for ($i = 0; $i < 10; $i++)
            <div class="p-6 sm:p-2">
                <h2 class="text-xl text-white font-bold mb-4">{{ fake()->name() }}</h2>
                <div class="flex overflow-scroll sm:overflow-hidden sm:gap-2 sm:flex-wrap sm:h-48">
                    @foreach ($playlists->random(8) as $playlist)
                        <a href="{{ route('playlist.show', ['id' => $playlist->id]) }}"
                            class="flex-none w-40 hover:bg-white/10 p-2 rounded cursor-pointer sm:w-28 transition-all duration-500 sm:mb-4">
                            <picture>
                                <img src="{{ 'imgs/' . random_int(1, 36) . '.webp' }}" alt="Music Image"
                                    class='w-40 sm:w-24 rounded'>
                            </picture>
                            <div class="mt-2 sm:w-24">
                                <p class="text-white font-medium sm:text-xs">{{ substr($playlist->title, 0, 16) }}</p>
                                <p class="hidden sm:inline text-white/40 text-xs">{{ $playlist->user()->first()->name }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endfor
    </main>
    <footer class="mb-48 mt-10 px-6 h-fit sm:p-2 sm:mb-0">
        <div class='border-b-gray-400/20 border-b-2  sm:flex sm:gap-16 sm:pb-12'>
            <div class="flex flex-col gap-1">
                <h3 class="text-white text-xl font-bold mb-2 sm:text-xs">Company</h3>
                <p
                    class="text-gray-300 w-fit hover:text-white transition-all cursor-pointer border-transparent hover:border-white border-b-2 sm:text-xs">
                    About</p>
                <p
                    class="text-gray-300 w-fit hover:text-white transition-all cursor-pointer border-transparent hover:border-white border-b-2 sm:text-xs">
                    Jobs</p>
                <p
                    class="text-gray-300 w-fit hover:text-white transition-all cursor-pointer border-transparent hover:border-white border-b-2 sm:text-xs">
                    For The Record</p>
            </div>

            <div class="flex flex-col gap-1 mt-8 sm:mt-0">
                <h3 class="text-white text-xl font-bold mb-2 sm:text-xs">Communities</h3>
                <p
                    class="text-gray-300 w-fit hover:text-white transition-all cursor-pointer border-transparent hover:border-white border-b-2 sm:text-xs">
                    For Artists</p>
                <p
                    class="text-gray-300 w-fit hover:text-white transition-all cursor-pointer border-transparent hover:border-white border-b-2 sm:text-xs">
                    Developers</p>
                <p
                    class="text-gray-300 w-fit hover:text-white transition-all cursor-pointer border-transparent hover:border-white border-b-2 sm:text-xs">
                    Advertising</p>
                <p
                    class="text-gray-300 w-fit hover:text-white transition-all cursor-pointer border-transparent hover:border-white border-b-2 sm:text-xs">
                    Investor</p>
                <p
                    class="text-gray-300 w-fit hover:text-white transition-all cursor-pointer border-transparent hover:border-white border-b-2 sm:text-xs">
                    Vendors</p>
                <p
                    class="text-gray-300 w-fit hover:text-white transition-all cursor-pointer border-transparent hover:border-white border-b-2 sm:text-xs">
                    Spotify for Work</p>
            </div>

            <div class="flex flex-col gap-1 mt-8 mb-12 sm:text-xs sm:mt-0">
                <h3 class="text-white text-xl font-bold mb-2 sm:text-xs">Userfull Links</h3>
                <p
                    class="text-gray-300 w-fit hover:text-white transition-all cursor-pointer border-transparent hover:border-white border-b-2 sm:text-xs">
                    Support</p>
                <p
                    class="text-gray-300 w-fit hover:text-white transition-all cursor-pointer border-transparent hover:border-white border-b-2 sm:text-xs">
                    Free Mobile App</p>
                <p
                    class="text-gray-300 w-fit hover:text-white transition-all cursor-pointer border-transparent hover:border-white border-b-2 sm:text-xs">
                    Consumer rights</p>
            </div>
        </div>
        <div class="mt-12 sm:mt-6 sm:pb-12">
            <div class="flex gap-2 flex-wrap sm:text-xs">
                <p class="text-gray-300 flex-none text-sm hover:text-white transition-all cursor-pointer hover:border-b-2">
                    Legal</p>
                <p class="text-gray-300 flex-none text-sm hover:text-white transition-all cursor-pointer hover:border-b-2">
                    Privacy Center</p>
                <p class="text-gray-300 flex-none text-sm hover:text-white transition-all cursor-pointer hover:border-b-2">
                    Privacy Policy</p>
                <p class="text-gray-300 flex-none text-sm hover:text-white transition-all cursor-pointer hover:border-b-2">
                    Cookies Settings</p>
                <p class="text-gray-300 flex-none text-sm hover:text-white transition-all cursor-pointer hover:border-b-2">
                    About Ads</p>
                <p class="text-gray-300 flex-none text-sm hover:text-white transition-all cursor-pointer hover:border-b-2">
                    Accesibility</p>
            </div>
        </div>
    </footer>
@endsection
