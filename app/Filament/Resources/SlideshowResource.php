<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SlideshowResource\Pages;
use App\Filament\Resources\SlideshowResource\RelationManagers;
use App\Models\Industry;
use App\Models\Slideshow;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
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

class SlideshowResource extends Resource
{
  protected static ?string $model = Slideshow::class;

  protected static ?string $navigationIcon = 'heroicon-o-command-line';

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
          ->required()
          ->columnSpanFull(),
        TextInput::make('slug')
          ->label('Slug')
          ->required()
          ->maxLength(255)
          ->disabled()
          ->dehydrated()
          ->helperText('Slug akan otomatis dihasilkan dari judul.')
          ->columnSpanFull(),
        Textarea::make('description')
          ->autosize()
          ->label('Keterangan')
          ->maxLength(300)
          ->columnSpanFull(),
        RichEditor::make('content')
          ->label('Konten')
          ->columnSpanFull(),
        DatePicker::make('publish_date')
          ->label('Tanggal Publikasi')
          ->default(today())
          ->required(),
        TextInput::make('redirect')
          ->label('Direct url')
          ->datalist(Industry::all()->pluck('slug'))
          ->helperText('Kosongkan jika tidak ada'),
        FileUpload::make('image')
          ->label('Gambar')
          ->maxSize(1024)
          ->directory('/slideshow/' . date('Y/m'))
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
      ->actions([
        Tables\Actions\ActionGroup::make([
          Tables\Actions\EditAction::make(),
          Tables\Actions\DeleteAction::make(),
        ])
      ]);;
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
      'index' => Pages\ListSlideshows::route('/'),
      'create' => Pages\CreateSlideshow::route('/create'),
      'edit' => Pages\EditSlideshow::route('/{record}/edit'),
    ];
  }
}
