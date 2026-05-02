<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'content',
    ];

    protected $casts = [
        'content' => 'array',
    ];
}
