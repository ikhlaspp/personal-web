<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
     protected $fillable = [
        'title',
        'description',
        'image_path',
        'tool',
        'category',
    ];
}
