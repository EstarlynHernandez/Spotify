@extends('base')
@section('title')
    Get App
@endsection
@section('content')
    <div class="w-screen h-screen bg-gradient-to-tr from-blue-950 from-40% to-fuchsia-600">
        <div class="w-full h-full bg-gradient-to-t from-black to-transparent to-35%">
            <div class="p-6">
                <div class="mb-10">
                    <a href="#">
                        <img class="w-8" src="{{ asset('icons/return.svg') }}" alt="Back">
                    </a>
                </div>
                <div class='bg-white/40 p-6 rounded-lg flex flex-col gap-2'>
                    <img class="w-12 m-auto" src="{{ asset('icons/app_color.svg') }}" alt="Back">
                    <h3 class="text-white text-center text-xl font-bold">Get the Spotify app</h3>
                    <p class="text-white text-center">It's not only free, but includes the full suite of spotify features.
                        just one more way to stream and enjoy.</p>
                    <a class="p-4 bg-white w-36 text-center m-auto rounded-full"
                        href="https://play.google.com/store/apps/details?id=com.spotify.music">Get the app</a>
                </div>
            </div>
        </div>
    </div>
@endsection
