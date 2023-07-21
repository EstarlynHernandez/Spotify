<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Playlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'visibility',
    ];

    function songsPlaylists():HasMany{
        return $this->hasMany(Song_playlist::class);
    }

    function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
}
