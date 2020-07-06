<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = [
        'title', 'slug', 'thumbnail', 'apearence', 'type', 'status', 'featured', 'details', 'video_link', 'post_date'
    ];
}
