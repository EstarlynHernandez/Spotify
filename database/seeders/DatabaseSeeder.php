<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    //code...
    public function run(): void
    {
        try {
            // \App\Models\User::factory(10)->create();

            \App\Models\User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => Hash::make('password'),
                'isArtist' => true,
                'followers' => 0,
            ]);

            \App\Models\Gender::factory(8)->create();

            \App\Models\User::factory(15)->create();

            \App\Models\Playlist::factory(20)->create();

            \App\Models\Song_playlist::factory(140)->create();

            \App\Models\Artist::factory(10)->create();

            \App\Models\Song_owner::factory(15)->create([
                'song_id' => null,
            ]);

            \App\Models\Song_owner::factory(119)->create([
                'album_id' => null,
            ]);

            \App\Models\Album::factory(15)->create();

            \App\Models\Song::factory(120)->create();
        } catch (\Throwable $th) {
            echo $th->getMessage(). "\n";
            echo $th->getLine() . "\n";
            echo $th->getTraceAsString();

            die;
        }
    }
}
