<?php

namespace App\Filament\Resources\CompanyJourneyResource\Pages;

use App\Filament\Resources\CompanyJourneyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCompanyJourney extends EditRecord
{
    protected static string $resource = CompanyJourneyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
