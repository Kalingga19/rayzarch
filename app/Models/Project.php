<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title','slug','year','category','description','cover_image','gallery',
    ];

    protected $casts = [
        'gallery' => 'array',
        'year' => 'integer',
    ];
}
