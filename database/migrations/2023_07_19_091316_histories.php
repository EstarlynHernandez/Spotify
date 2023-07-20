<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Song;
use App\Models\Playlist;
use App\Models\Album;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('histories', function(Blueprint $t){
            $t->id();
            $t->foreignIdFor(User::class);
            $t->foreignIdFor(Song::class)->nullable();
            $t->foreignIdFor(Playlist::class)->nullable();
            $t->foreignIdFor(Album::class)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
