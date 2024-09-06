<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IndustryResource\Pages;
use App\Filament\Resources\IndustryResource\RelationManagers;
use App\Models\Industry;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class IndustryResource extends Resource
{
  protected static ?string $model = Industry::class;

  protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([

        Textarea::make('title')
          ->autosize()
          ->label('Judul')
          ->maxLength(250)
          ->live(onBlur: true)
          ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
          ->required(),
        TextInput::make('slug')
          ->label('Slug')
          ->required()
          ->maxLength(255)
          ->disabled()
          ->dehydrated()
          ->helperText('Slug akan otomatis dihasilkan dari judul.'),
        Textarea::make('description')
          ->autosize()
          ->label('Keterangan')
          ->maxLength(300),
        Textarea::make('content')
          ->autosize()
          ->label('Konten'),
        FileUpload::make('image')
          ->label('Gambar')
          ->maxSize(1024)
          ->directory('/image/' . date('Y/m'))
          ->image()
          ->imageEditor()
          ->openable()
          ->downloadable()
          ->helperText('Maksimal ukuran file 1024 kb atau 1 mb'),
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
          ->wrap()
          ->searchable(),
        TextColumn::make('description')
          ->label('Deskripsi')
          ->wrap()
          ->searchable(),
      ])
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
      'index' => Pages\ListIndustries::route('/'),
      'create' => Pages\CreateIndustry::route('/create'),
      'edit' => Pages\EditIndustry::route('/{record}/edit'),
    ];
  }
}
