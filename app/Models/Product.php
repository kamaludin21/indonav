<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
  use HasFactory;

  protected $fillable = [
    'industry_id',
    'title',
    'slug',
    'image_product',
    'description',
    'image_highlight',
    'highlight',
    'features',
    'specifications',
  ];

  protected $casts = [
    'features' => 'array',
    'specifications' => 'array',
  ];


  public function industry(): BelongsTo
{
    return $this->belongsTo(Industry::class);
}


}
