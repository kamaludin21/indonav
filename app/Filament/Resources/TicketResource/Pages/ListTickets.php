<?php

namespace App\Filament\Resources\TicketResource\Pages;

use App\Filament\Resources\TicketResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Components\Tab;

class ListTickets extends ListRecords
{
  protected static string $resource = TicketResource::class;

  protected function getHeaderActions(): array
  {
    return [
      Actions\CreateAction::make(),
    ];
  }

  public function getTabs(): array
  {
    return [
      'all' => Tab::make('Semua data'),
      'queue' => Tab::make('Antrian')
        ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 'queue')),
      'process' => Tab::make('Proses')
        ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 'process')),
      'done' => Tab::make('Selesai')
        ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 'done')),
    ];
  }
}
