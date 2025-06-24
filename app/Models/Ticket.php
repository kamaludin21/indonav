<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
  protected $fillable = [
    'token',
    'full_name',
    'email',
    'phone_number',
    'company',
    'ticket_category',
    'subject',
    'description',
    'attachment',
    'status',
    'note',
  ];
}
