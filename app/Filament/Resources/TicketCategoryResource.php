<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TicketCategoryResource\Pages;
use App\Filament\Resources\TicketCategoryResource\RelationManagers;
use App\Models\TicketCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TicketCategoryResource extends Resource
{
  protected static ?string $model = TicketCategory::class;

  protected static ?string $navigationIcon = 'heroicon-o-tag';
  protected static ?int $navigationSort = 6;


  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Textarea::make('title')
          ->label('Judul')
          ->maxLength(250)
          ->required(),
        Textarea::make('description')
          ->label('Keterangan'),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('index')
          ->label('No.')
          ->rowIndex(),
        TextColumn::make('title')
          ->label('Judul')
          ->searchable(),
        TextColumn::make('description')
          ->label('Keterangan'),
      ])
      ->actions([

        Tables\Actions\EditAction::make(),
      ])
      ->bulkActions([
        Tables\Actions\BulkActionGroup::make([
          Tables\Actions\DeleteBulkAction::make(),
        ]),
      ]);
  }

  public static function getRelations(): array
  {
    return [
      //
    ];
  }

  public static function getPages(): array
  {
    return [
      'index' => Pages\ListTicketCategories::route('/'),
      // 'create' => Pages\CreateTicketCategory::route('/create'),
      'edit' => Pages\EditTicketCategory::route('/{record}/edit'),
    ];
  }
}
