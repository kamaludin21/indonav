<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Models\Industry;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        $tabs = [
            'all' => Tab::make('Semua'),
        ];
        $categories = Industry::all();
        foreach ($categories as $category) {
            $tabs[$category->slug] = Tab::make($category->slug)
                ->modifyQueryUsing(
                    fn(Builder $query) =>
                    $query->where('industry_id', $category->id)
                );
        }

        return $tabs;
    }
}
