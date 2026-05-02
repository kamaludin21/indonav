<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
  use HasFactory;

  protected $fillable = [
    'title',
    'slug',
    'url',
    'image',
    'description',
  ];

  protected $appends = ['embed_video_url'];

  public function getEmbedVideoUrlAttribute()
  {
    if (!$this->url) {
      return null;
    }

    // support youtube.com & youtu.be
    preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^\s&]+)/', $this->url, $matches);
    $videoId = $matches[1] ?? null;

    if (!$videoId) {
      return null;
    }

    return "https://www.youtube.com/embed/{$videoId}?controls=0&rel=0&autoplay=1&loop=1&playlist={$videoId}";
  }
}
