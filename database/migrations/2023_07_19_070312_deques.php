<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('deques', function(Blueprint $t){
            $t->id();
            $t->foreignIdFor(User::class)->nullable();
            $t->string('device')->nullable();
            $t->integer('position');
            $t->boolean('repeat');
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deques');
    }
};
