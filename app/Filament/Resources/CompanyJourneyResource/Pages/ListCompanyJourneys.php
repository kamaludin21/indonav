<?php

namespace App\Filament\Resources\CompanyJourneyResource\Pages;

use App\Filament\Resources\CompanyJourneyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCompanyJourneys extends ListRecords
{
    protected static string $resource = CompanyJourneyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
