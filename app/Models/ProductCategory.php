<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
      'title',
      'slug',
      'description'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
