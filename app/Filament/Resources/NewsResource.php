<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Filament\Resources\NewsResource\RelationManagers;
use App\Models\News;
use DateTime;
use Filament\Forms;
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
use Illuminate\Support\Facades\Date;

class NewsResource extends Resource
{
  protected static ?string $model = News::class;

  protected static ?string $navigationIcon = 'heroicon-o-newspaper';

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
          ->placeholder('Slug')
          ->unique(ignoreRecord: true)
          ->disabled()
          ->dehydrated()
          ->readOnly()
          ->columnSpanFull(),
        Textarea::make('description')
          ->autosize()
          ->label('Keterangan')
          ->maxLength(300)
          ->columnSpanFull(),
        RichEditor::make('content')
          ->label('Konten')
          ->columnSpanFull(),
        FileUpload::make('image')
          ->label('Gambar')
          ->maxSize(1024)
          ->directory('/news/' . date('Y/m'))
          ->image()
          ->imageEditor()
          ->openable()
          ->downloadable()
          ->helperText('Maksimal ukuran file 1024 kb atau 1 mb'),
          DatePicker::make('publish_date')
          ->label('Tanggal Publikasi')
          ->default(today())
          ->required(),
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
          ->lineClamp(2)
          ->searchable(),
        TextColumn::make('publish_date')
          ->label('Publikasi')
          ->date()
          ->searchable(),
      ])
      ->actions([
        Tables\Actions\ActionGroup::make([
          Tables\Actions\EditAction::make(),
          Tables\Actions\DeleteAction::make(),
        ])
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
      'index' => Pages\ListNews::route('/'),
      'create' => Pages\CreateNews::route('/create'),
      'edit' => Pages\EditNews::route('/{record}/edit'),
    ];
  }
}
