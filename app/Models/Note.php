<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'title',
        'category',
        'content',
        'images',
    ];

    protected $casts = [
        'images' => 'array',
    ];
}
