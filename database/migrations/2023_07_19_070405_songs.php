<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Gender;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('songs', function(Blueprint $t){
            $t->id();
            $t->string('name');
            $t->integer('duration');
            $t->longText('description')->nullable();
            $t->foreignIdFor(gender::class);
            $t->string('url');
            $t->longText('song_text');
            $t->string('img_url');
            $t->integer('listeners');
            $t->dateTime('launch_date');
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};
