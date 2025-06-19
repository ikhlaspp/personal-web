<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebProject extends Model
{
    protected $fillable = [
        'title',
        'description',
        'url',
        'image_path',
        'category',
        'technologies',
    ];

    protected $casts = [
        'technologies' => 'array',
    ];
}
