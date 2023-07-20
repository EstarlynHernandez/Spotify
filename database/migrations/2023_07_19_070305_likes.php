<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Song;
use App\Models\Album;
use App\Models\Playlist;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('likes', function(Blueprint $t){
            $t->id();
            $t->foreignIdFor(User::class);
            $t->foreignIdFor(Song::class)->nullable();
            $t->foreignIdFor(Playlist::class)->nullable();
            $t->foreignIdFor(Album::class)->nullable();
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
