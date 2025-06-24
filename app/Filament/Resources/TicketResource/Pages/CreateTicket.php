<?php

namespace App\Filament\Resources\TicketResource\Pages;

use App\Filament\Resources\TicketResource;
use Filament\Actions;
use Illuminate\Support\Str;
use Filament\Resources\Pages\CreateRecord;

class CreateTicket extends CreateRecord
{
  protected static string $resource = TicketResource::class;

  protected function mutateFormDataBeforeCreate(array $data): array
  {
    $data['token'] = strtoupper(Str::random(2)) . mt_rand(10000, 99999);
    return $data;
  }
}
