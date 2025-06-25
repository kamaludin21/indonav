<?php

namespace App\Filament\Resources\IndustryResource\Pages;

use App\Filament\Resources\IndustryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateIndustry extends CreateRecord
{
  protected static string $resource = IndustryResource::class;

  protected function mutateFormDataBeforeCreate(array $data): array
  {
    dd($data);
    $data['image'] = $data['media_type'] === 'image'
      ? $data['media_image'] ?? null
      : $data['media_video'] ?? null;

    unset($data['media_image'], $data['media_video']);

    return $data;
  }
}
