<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Song;
use App\Models\Deque;
use App\Models\Playlist;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('song_playlists', function(Blueprint $t){
            $t->id();
            $t->foreignIdFor(Song::class);
            $t->foreignIdFor(Playlist::class)->nullable();
            $t->foreignIdFor(Deque::class)->nullable();
            $t->integer('position');
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('song_playlists');
    }
};
