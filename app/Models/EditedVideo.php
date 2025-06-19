<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EditedVideo extends Model
{
     protected $fillable = [
        'title',
        'description',
        'video_url',
        'thumbnail_path',
        'software_used',
        'duration_seconds',
        'category',
    ];
}
