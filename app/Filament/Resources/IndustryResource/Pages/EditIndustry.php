<?php

namespace App\Filament\Resources\IndustryResource\Pages;

use App\Filament\Resources\IndustryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndustry extends EditRecord
{
  protected static string $resource = IndustryResource::class;

  protected function getHeaderActions(): array
  {
    return [
      Actions\DeleteAction::make(),
    ];
  }

  protected function mutateFormDataBeforeSave(array $data): array
  {
    // dd($data);
    $data['image'] = $data['media_type'] === 'image'
      ? $data['media_image'] ?? null
      : $data['media_video'] ?? null;

    unset($data['media_image'], $data['media_video']);

    return $data;
  }

  protected function mutateFormDataBeforeFill(array $data): array
  {
    // dd($data);
    if ($data['media_type'] === 'image') {
      $data['media_image'] = $data['image'];
    } elseif ($data['media_type'] === 'video') {
      $data['media_video'] = $data['image'];
    }

    return $data;
  }
}
