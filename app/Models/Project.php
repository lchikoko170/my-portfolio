<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'image',
        'technologies',
        'github_url',
        'live_url',
        'featured',
        'status',
    ];

    protected $casts = [
        'featured' => 'boolean',
    ];
}