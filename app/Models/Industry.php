<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Industry extends Model
{
  use HasFactory;

  protected $fillable = [
    'title',
    'description',
    'slug',
    'image',
    'media_type',
  ];

  protected $appends = ['embed_url'];

  public function getEmbedUrlAttribute()
  {
    // if ($this->media_type === 'video' && $this->image) {
    //   // Extract YouTube video ID
    //   preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^\s&]+)/', $this->image, $matches);
    //   $videoId = $matches[1] ?? null;
    //   return $videoId ? "https://www.youtube.com/embed/{$videoId}?controls=0&rel=0&autoplay=1&loop=1" : null;
    // }
    // return null;
    if ($this->media_type === 'video' && $this->image) {
      // Extract YouTube video ID
      preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^\s&]+)/', $this->image, $matches);
      $videoId = $matches[1] ?? null;

      if (!$videoId) {
        return null;
      }

      // Autoplay + Loop require playlist param with same video ID
      return "https://www.youtube.com/embed/{$videoId}?controls=0&rel=0&autoplay=1&loop=1&playlist={$videoId}";
    }

    return null;
  }

  public function products(): HasMany
  {
    return $this->hasMany(Product::class);
  }
}
