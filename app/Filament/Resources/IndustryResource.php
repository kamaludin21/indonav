<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IndustryResource\Pages;
use App\Models\Industry;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class IndustryResource extends Resource
{
  protected static ?string $model = Industry::class;

  protected static ?string $navigationIcon = 'heroicon-o-home-modern';
  protected static ?int $navigationSort = 3;

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Textarea::make('title')
          ->autosize()
          ->rows(1)
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
          ->rows(1)
          ->label('Keterangan')
          ->maxLength(300),
        // FileUpload::make('image')
        //   ->label('Gambar')
        //   ->maxSize(1024)
        //   ->directory('industries')
        //   ->image()
        //   ->imageEditor()
        //   ->openable()
        //   ->downloadable()
        //   ->helperText('Maksimal ukuran file 1024 kb atau 1 mb'),
        Select::make('media_type')
          ->label('Media Type')
          ->options([
            'image' => 'Image',
            'video' => 'YouTube Video',
          ])
          ->required()
          ->reactive(),

        // Image uploader when "image" is selected
        FileUpload::make('media_image')
          ->label('Gambar')
          ->maxSize(1024)
          ->directory('industries')
          ->image()
          ->imageEditor()
          ->openable()
          ->downloadable()
          ->helperText('Maksimal ukuran file 1024 kb atau 1 mb')
          ->visible(fn($get) => $get('media_type') === 'image'),

        // YouTube URL input when "video" is selected
        TextInput::make('media_video')
          ->label('YouTube Video URL')
          ->visible(fn($get) => $get('media_type') === 'video'),
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
      ]);
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
