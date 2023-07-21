@extends('base')

@section('title')
    Search
@endsection

@section('content')
    <div class="p-6 mt-4 mb-28 sm:mb-0 sm:w-full sm:min-h-full">
        <div class="w-full sm:hidden">
            <h1 class="text-4xl text-white font-bold">Search</h1>
            <form action="#" class="bg-white py-3 px-4 rounded flex gap-2 mt-5">
                <img src="{{ asset('icons/search_dark.svg') }}" alt="Search">
                <input class='outline-none w-full h-full' type="text" placeholder="What do you want to listen to?">
            </form>
        </div>
        <h2 class="text-white my-5 font-bold sm:text-2xl">Browser all</h2>
        <div class="grid grid-cols-2 gap-4 w-full sm:flex sm:flex-wrap">
            @for ($i = 0; $i < 21; $i++)
                <div style="background-color: rgb({{ random_int(1, 178) }}, {{ random_int(1, 178) }}, {{ random_int(1, 178) }})"
                    class="bg-yellow-900 p-4 h-20 overflow-hidden relative rounded-xl sm:w-56 sm:h-56 flex-none">
                    <h3 class="text-white w-4/5 sm:text-2xl sm:font-bold">{{ substr(fake()->name(), 0, 15) }}</h3>
                    <img class=" w-28 absolute -right-5 top-8 rotate-45 sm:top-1/2"
                        src="{{ asset('imgs/' . random_int(1, 36) . '.webp') }}" alt="Image">
                </div>
            @endfor
        </div>
    </div>

    <footer class="mb-48 mt-10 px-6 h-fit sm:p-2 sm:mb-0">
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
