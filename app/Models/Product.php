<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
      'industry_id',
      'title',
      'description',
      'content',
      'image'
    ];

    public function productCategory()
    {
        return $this->belongsToMany(ProductCategory::class);
    }
  }

