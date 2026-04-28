<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicePage extends Model
{
    protected $fillable = [
        'image',
        'label',
        'slug',
        'title',
        'outputs',
        'formats',
        'sections',
    ];

    protected $casts = [
        'outputs' => 'array',
        'formats' => 'array',
        'sections' => 'array',
    ];
}
