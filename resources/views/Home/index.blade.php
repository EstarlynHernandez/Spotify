@extends('base')
@section('page')home @endsection
@section('title')
    Home
@endsection

@section('content')
    <main>
        <picture class='justify-end flex p-6'>
            <img class='w-6' src="icons/gear.svg" alt="setings">
        </picture>

        @for ($i = 0; $i < 10; $i++)
            <div class="p-6">
                <h2 class="text-xl text-white font-bold mb-4">{{ fake()->name() }}</h2>
                <div class="flex overflow-scroll gap-4">
                    @for ($e = 0; $e < 10; $e++)
                        <div class="flex-none">
                            <picture>
                                <img src="imgs/{{ random_int(1, 36) }}.jpeg" alt="Music Image" class='w-40 rounded'>
                            </picture>
                            <div class="mt-2">
                                <p class="text-white font-medium">{{ fake()->name() }}</p>
                                <p class="text-white font-medium"></p>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        @endfor
    </main>
    <footer class="mb-48 mt-10 px-6">
        <div class='border-b-gray-400/40 border-b-2'>
            <div class="flex flex-col gap-1">
                <h3 class="text-white text-xl font-bold mb-2">Company</h3>
                <p class="text-gray-300">About</p>
                <p class="text-gray-300">Jobs</p>
                <p class="text-gray-300">For The Record</p>
            </div>

            <div class="flex flex-col gap-1 mt-8">
                <h3 class="text-white text-xl font-bold mb-2">Communities</h3>
                <p class="text-gray-300">For Artists</p>
                <p class="text-gray-300">Developers</p>
                <p class="text-gray-300">Advertising</p>
                <p class="text-gray-300">Investor</p>
                <p class="text-gray-300">Vendors</p>
                <p class="text-gray-300">Spotify for Work</p>
            </div>

            <div class="flex flex-col gap-1 mt-8 mb-12">
                <h3 class="text-white text-xl font-bold mb-2">Userfull Links</h3>
                <p class="text-gray-300">Support</p>
                <p class="text-gray-300">Free Mobile App</p>
                <p class="text-gray-300">Consumer rights</p>
            </div>
        </div>
        <div class="mt-12">
            <div class="flex gap-2 flex-wrap">
                <p class="text-gray-300 flex-none text-sm">Legal</p>
                <p class="text-gray-300 flex-none text-sm">Privacy Center</p>
                <p class="text-gray-300 flex-none text-sm">Privacy Policy</p>
                <p class="text-gray-300 flex-none text-sm">Cookies Settings</p>
                <p class="text-gray-300 flex-none text-sm">About Ads</p>
                <p class="text-gray-300 flex-none text-sm">Accesibility</p>
            </div>
        </div>
    </footer>
@endsection
