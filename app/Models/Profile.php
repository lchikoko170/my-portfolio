<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'title',
        'subtitle',
        'bio',
        'about',
        'location',
        'email',
        'phone',
        'profile_image',
        'cv_file',
        'github_url',
        'linkedin_url',
        'facebook_url',
        'twitter_url',
    ];
}