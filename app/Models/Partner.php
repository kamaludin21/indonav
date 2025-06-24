<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
  protected $fillable = ['title', 'image', 'url', 'order'];

  public static function booted()
  {
    static::creating(function ($partner) {
      if ($partner->order === null) {
        $maxOrder = self::max('order') ?? 0;
        $partner->order = $maxOrder + 1;
      }
    });
  }
}
