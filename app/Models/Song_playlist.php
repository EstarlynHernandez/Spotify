<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Song_playlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'song_id',
        'playlist_id',
        'deque_id',
        'position',
    ];

    public function song(): BelongsTo
    {
        return $this->belongsTo(Song::class);
    }

    public function playlist(): BelongsTo
    {
        return $this->belongsTo(Playlist::class);
    }

    public function deque(): BelongsTo
    {
        return $this->belongsTo(Deque::class);
    }
}
