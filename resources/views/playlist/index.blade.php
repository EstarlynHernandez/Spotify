@extends('base')
@section('title')
    {{ $playlist->title }}
@endsection
@section('content')
    <div>
        <div style="--tw-gradient-to: rgb({{ random_int(0, 255) }}, {{ random_int(0, 255) }}, {{ random_int(0, 255) }})"
            class='bg-gradient-to-t from-black px-6 pt-6 to-90% sm:px-0'>
            <div class="mb-10 sm:hidden">
                <a href="{{ url()->previous() }}">
                    <img class="w-8" src="{{ asset('icons/return.svg') }}" alt="Back">
                </a>
            </div>
            <div class="sm:flex w-fit sm:gap-4 sm:mt-24 sm:px-6 sm:justify-start">
                <img src="{{ asset('imgs/' . random_int(1, 36) . '.webp') }}" alt="Album Image" class="w-56 m-auto">
                <div class="flex flex-col justify-between">
                    <p class="text-white text-sm mt-4 font-bold">Playlist</p>
                    <h2 class="text-white text-4xl mt-4 font-bold">{{ $playlist->title }}</h2>
                    <p class="text-white/70 mt-4 sm:hidden"><span class="text-white">Artist 1</span> and <span
                            class="text-white">Artist
                            2</span></p>
                    <div class="flex gap-4 items-center mt-4">
                        <img src="{{ asset('imgs/' . random_int(1, 36) . '.webp') }}" alt="User"
                            class="w-10 rounded-full sm:hidden">
                        <p class="text-white sm:text-xs">{{ fake()->name() }} <span class="hidden sm:inline"> .
                                {{ count($songs) }} tracks</span></p>
                    </div>
                    <p class="text-white/70 mt-2 text-sm">{{ random_int(0, 10) . ' hr ' . random_int(0, 59) . ' min' }}</p>
                </div>
            </div>
            <div class="mt-6 flex justify-between items-center sm:bg-gradient-to-t sm:from-gray-600/30 sm:to-black/20">
                <div class="flex gap-6 sm:hidden">
                    <img class="w-6" src="{{ asset('icons/heart.svg') }}" alt="Like">
                    <img class="w-6" src="{{ asset('icons/share.svg') }}" alt="Share">
                    <img class="w-6" src="{{ asset('icons/point_vertical.svg') }}" alt="Options">
                </div>
                <div class="flex sm:gap-4 sm:p-6">
                    <img class="w-14 sm:w-10" src="{{ asset('icons/play_circle_lime.svg') }}" alt="">
                    <img class="w-5 hidden sm:block" src="{{ asset('icons/heart.svg') }}" alt="">
                    <img class="w-6 hidden sm:block" src="{{ asset('icons/point.svg') }}" alt="">
                </div>
            </div>
        </div>

        <div class="mt-12 mb-40 sm:mb-6">
            <div class="hidden justify-between mt-4 px-6 sm:grid grid-col">
                <p class="text-white/50">#</p>
                <p class="text-white/50">Title</p>
                <p class="text-white/50">Album</p>
                <p class="text-white/50">Date added</p>
                <p>🕛</p>
            </div>
            @foreach ($songs as $song)
                <div class="flex justify-between mt-4 cursor-pointer sm:block hover:bg-white/10 sm:mt-0">
                    <div class="flex items-center sm:grid grid-col">
                        <p class="text-white w-16 h-16 flex items-center justify-center">
                            {{ array_search($song, $songs) + 1 }}</p>
                        <div class='w-9/12' id='{{ $song->id }}'>
                            <h3 like="{{ in_array($song->id, session('like')) }}" id="{{ array_search($song, $songs) }}"
                                value='{{ $song->url }}' class="text-white songs sm:text-base sm:font-bold">
                                {{ substr($song->name, 0, 24) }}</h3>
                            <p class="text-white/70 text-sm sm:text-xs">
                                <?php
                                $owners = $song->owners()->get();
                                $i = 1;
                                ?>
                                @if ($owners->count() > 0)
                                    @foreach ($owners as $owner)
                                        {{ $owner->user()->first()->name }}{{ $owners->count() > $i ? ',' : '' }}
                                    @endforeach
                                @else
                                    unknown
                                @endif
                            </p>
                        </div>
                        <p class="text-white hidden sm:inline">{{ substr($playlist->title, 0, 24) }}</p>
                        <p class="text-white hidden sm:inline">{{ substr($song->created_at, 0, 10) }}</p>
                        <p class="text-white hidden sm:inline">{{ random_int(0, 2) }}:{{ random_int(10, 59) }}</p>
                    </div>
                    <img class="w-16 h-16 p-5 sm:hidden" src="{{ asset('icons/point_vertical.svg') }}" alt="Options">
                </div>
            @endforeach
        </div>
    </div>

    <footer class="mb-48 mt-10 px-6 h-fit sm:p-2 sm:mb-0 sm:mt-20">
        <div class='border-b-gray-400/20 border-b-2  sm:flex sm:gap-36 sm:pb-12'>
            <div class="flex flex-col gap-2">
                <h3 class="text-white text-xl font-bold mb-2 sm:text-xl">Company</h3>
                <p
                    class="text-gray-300 w-fit hover:text-white transition-all cursor-pointer border-transparent hover:border-white border-b-2">
                    About</p>
                <p
                    class="text-gray-300 w-fit hover:text-white transition-all cursor-pointer border-transparent hover:border-white border-b-2">
                    Jobs</p>
                <p
                    class="text-gray-300 w-fit hover:text-white transition-all cursor-pointer border-transparent hover:border-white border-b-2">
                    For The Record</p>
            </div>

            <div class="flex flex-col gap-2 mt-8 sm:mt-0">
                <h3 class="text-white text-xl font-bold mb-2 sm:text-xl">Communities</h3>
                <p
                    class="text-gray-300 w-fit hover:text-white transition-all cursor-pointer border-transparent hover:border-white border-b-2">
                    For Artists</p>
                <p
                    class="text-gray-300 w-fit hover:text-white transition-all cursor-pointer border-transparent hover:border-white border-b-2">
                    Developers</p>
                <p
                    class="text-gray-300 w-fit hover:text-white transition-all cursor-pointer border-transparent hover:border-white border-b-2 sm:text-xl">
                    Advertising</p>
                <p
                    class="text-gray-300 w-fit hover:text-white transition-all cursor-pointer border-transparent hover:border-white border-b-2 sm:text-xl">
                    Investor</p>
                <p
                    class="text-gray-300 w-fit hover:text-white transition-all cursor-pointer border-transparent hover:border-white border-b-2">
                    Vendors</p>
                <p
                    class="text-gray-300 w-fit hover:text-white transition-all cursor-pointer border-transparent hover:border-white border-b-2">
                    Spotify for Work</p>
            </div>

            <div class="flex flex-col gap-2 mt-8 mb-12 sm:text-2xl sm:mt-0">
                <h3 class="text-white text-xl font-bold mb-2 sm:text-xl">Userfull Links</h3>
                <p
                    class="text-gray-300 w-fit hover:text-white transition-all cursor-pointer border-transparent hover:border-white border-b-2 sm:text-base">
                    Support</p>
                <p
                    class="text-gray-300 w-fit hover:text-white transition-all cursor-pointer border-transparent hover:border-white border-b-2 sm:text-base">
                    Free Mobile App</p>
                <p
                    class="text-gray-300 w-fit hover:text-white transition-all cursor-pointer border-transparent hover:border-white border-b-2 sm:text-base">
                    Consumer rights</p>
            </div>
        </div>
        <div class="mt-12 sm:mt-6 sm:pb-12">
            <div class="flex gap-4 flex-wrap sm:text-xs">
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
