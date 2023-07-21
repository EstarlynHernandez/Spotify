<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Gender;
use App\Models\Playlist;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->session()->put('like', [1, 108, 19]);
        $playlists = Playlist::all();
        $page = 'home';
        return view('home/index', compact('playlists', 'page'));
    }

    public function app()
    {
        $page = 'app';
        return view('home/app', compact('page'));
    }

    public function search()
    {
        $page = 'search';
        $genders = Gender::all();
        return view('home/search', compact('genders', 'page'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        if (isset($id) && is_numeric($id)) {
            $playlist = Playlist::find($id);
            $songsPlaylists = $playlist->songsPlaylists()->get();
            $songs = [];
            foreach ($songsPlaylists as $songsPlaylist) {
                $songs[] = $songsPlaylist->song()->first();
            }
        }

        return view('playlist/index', compact('playlist', 'songs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
