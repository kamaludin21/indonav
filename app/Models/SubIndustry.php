<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubIndustry extends Model
{
    use HasFactory;

    protected $fillable = [
      'industry_id',
      'title',
      'slug',
      'description'
    ];
}
