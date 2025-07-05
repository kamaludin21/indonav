<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Developer extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-command-line';

    protected static string $view = 'filament.pages.developer';

    protected static ?int $navigationSort = 7;
}
