<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use App\Models\Industry;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductResource extends Resource
{
  protected static ?string $model = Product::class;

  protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
  protected static ?int $navigationSort = 2;

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Select::make('industry_id')
          ->label('Kategori Produk')
          ->options(Industry::all()->pluck('title', 'id'))
          ->searchable()
          ->required()
          ->native(false)
          ->columnSpanFull(),
        Textarea::make('title')
          ->autosize()
          ->label('Nama Produk')
          ->maxLength(250)
          ->rows(1)
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
          ->label('Keterangan Pendek')
          ->maxLength(300),
          FileUpload::make('image_product')
          ->label('Gambar Produk')
          ->maxSize(1024)
          ->directory('products/')
          ->image()
          ->openable()
          ->downloadable()
          ->helperText('Maksimal ukuran file 1000KB atau 1MB'),
        RichEditor::make('highlight')
          ->label('Highlight'),
        FileUpload::make('image_highlight')
          ->label('Gambar Ilustrasi')
          ->maxSize(1024)
          ->directory('products/highlight/')
          ->image()
          ->openable()
          ->downloadable()
          ->helperText('Maksimal ukuran file 1000KB atau 1MB'),
        Repeater::make('features')
          ->schema([
            FileUpload::make('image')
              ->label('Gambar')
              ->maxSize(1024)
              ->directory('products/features')
              ->image()
              ->imageEditor()
              ->openable()
              ->downloadable()
              ->helperText('Maksimal ukuran file 1000KB atau 1MB'),
            TextInput::make('title'),
            Textarea::make('description')->autosize(),
          ]),
        Repeater::make('specifications')
          ->schema([
            FileUpload::make('document')
              ->label('File')
              ->maxSize(5120)
              ->openable()
              ->downloadable()
              ->directory('products/documents/')
              ->helperText('Maksimal ukuran file 5000KB atau 5MB'),
            TextInput::make('title'),
          ]),
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
          ->label('Nama Produk')
          ->searchable(),
        TextColumn::make('industry.title')
          ->label('Kategori')
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
      'index' => Pages\ListProducts::route('/'),
      'create' => Pages\CreateProduct::route('/create'),
      'edit' => Pages\EditProduct::route('/{record}/edit'),
    ];
  }
}
