<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartnerResource\Pages;
use App\Filament\Resources\PartnerResource\RelationManagers;
use App\Models\Partner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

use Filament\Forms\Components\FileUpload;

class PartnerResource extends Resource
{
  protected static ?string $model = Partner::class;

  protected static ?string $navigationIcon = 'heroicon-o-swatch';
  protected static ?int $navigationSort = 5;


  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Textarea::make('title')
          ->autosize()
          ->rows(1)
          ->label('Judul')
          ->maxLength(250)
          ->required(),
        FileUpload::make('image')
          ->label('Gambar')
          ->maxSize(1024)
          ->directory('partner')
          ->image()
          ->imageEditor()
          ->openable()
          ->downloadable()
          ->helperText('Maksimal ukuran file 1024 kb atau 1 mb'),
        TextInput::make('url')
          ->label('Direct url')
          ->helperText('Kosongkan jika tidak ada'),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->reorderable('order')
      ->columns([
        TextColumn::make('index')
          ->label('No.')
          ->rowIndex(),
        TextColumn::make('title')
          ->label('Judul')
          ->searchable(),
        ImageColumn::make('image')
          ->label('Preview')
          ->searchable(),
      ])
      ->defaultSort('order', 'asc')
      ->actions([
        Tables\Actions\EditAction::make(),
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
      'index' => Pages\ListPartners::route('/'),
      'create' => Pages\CreatePartner::route('/create'),
      'edit' => Pages\EditPartner::route('/{record}/edit'),
    ];
  }
}
