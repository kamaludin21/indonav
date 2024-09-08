<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Industry extends Model
{
  use HasFactory;

  protected $fillable = [
    'title',
    'slug',
    'description',
    'image'
  ];

  public function subindustry(): HasMany
  {
    return $this->hasMany(SubIndustry::class);
  }
}
