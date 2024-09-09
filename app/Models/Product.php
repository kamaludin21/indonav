<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
      'product_category_id',
      'title',
      'slug',
      'description',
      'content',
      'image'
    ];

    public function productCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }
  }

