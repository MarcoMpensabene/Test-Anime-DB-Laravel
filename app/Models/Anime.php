<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'sources',
        'type',
        'episodes',
        'status',
        'anime_season',
        'picture',
        'thumbnail',
        'synonyms',
        'related_anime',
        'tags'
    ];
    protected $casts = [
        'sources' => 'array',
        'anime_season' => 'array',
        'synonyms' => 'array',
        'related_anime' => 'array',
        'tags' => 'array',
    ];
}
