<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteResource\Pages;
use App\Filament\Resources\SiteResource\RelationManagers;
use App\Models\Industry;
use App\Models\Site;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SiteResource extends Resource
{
  protected static ?string $model = Site::class;

  protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Textarea::make('title')
          ->autosize()
          ->disabledOn('edit')
          ->label('Judul')
          ->maxLength(250)
          ->live(onBlur: true)
          ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
          ->required(),
        TextInput::make('slug')
          ->label('Slug')
          ->placeholder('Slug')
          ->unique(ignoreRecord: true)
          ->disabled()
          ->dehydrated()
          ->readOnly(),
        Textarea::make('description')
          ->autosize()
          ->label('Keterangan'),
        FileUpload::make('image')
          ->label('Gambar')
          ->maxSize(1024)
          ->directory('/industries/' . date('Y/m'))
          ->image()
          ->imageEditor()
          ->openable()
          ->downloadable()
          ->helperText('Maksimal ukuran file 1024 kb atau 1 mb'),
        TextInput::make('url')
          ->label('Direct url')
          ->datalist(Industry::all()->pluck('slug'))
          ->helperText('Kosongkan jika tidak ada'),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('index')
          ->label('No.')
          ->rowIndex(),
        TextColumn::make('index')
          ->label('No.')
          ->rowIndex(),
        TextColumn::make('title')
          ->label('Judul')
          ->searchable(),
        TextColumn::make('description')
          ->label('Deskripsi')
          ->wrap()
          ->lineClamp(2)
          ->searchable(),
      ])
      ->filters([
        //
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
      'index' => Pages\ListSites::route('/'),
      'create' => Pages\CreateSite::route('/create'),
      'edit' => Pages\EditSite::route('/{record}/edit'),
    ];
  }
}
