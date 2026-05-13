<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DownloadCenter extends Model
{
    protected $fillable = [
        'title',
        'category',
        'type',
        'file_url',
    ];
}
