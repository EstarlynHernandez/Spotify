<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'duration',
        'description',
        'gender_id',
        'url',
        'song_text',
        'img_url',
        'listeners',
    ];

    public function owners(): HasMany{
        return $this->hasMany(Song_owner::class);
    }
}
