<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Song_owner extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'song_id',
        'album_id',
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function song(): BelongsTo{
        return $this->belongsTo(Song::class);
    }

    public function album(): BelongsTo{
        return $this->belongsTo(Album::class);
    }
}
