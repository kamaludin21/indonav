<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use App\Models\Industry;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
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
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class ProductResource extends Resource
{
  protected static ?string $model = Product::class;
  protected static ?string $navigationGroup = 'Konten Website';
  protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
  protected static ?int $navigationSort = 2;
  protected static ?string $navigationLabel = 'Katalog Produk';
  protected static ?string $pluralModelLabel = 'Katalog Produk';
  protected static ?string $modelLabel = 'Katalog Produk';
  protected static ?string $slug = 'katalog-produk';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Select::make('industry_id')
          ->label('Kategori Produk')
          ->options(Industry::all()->pluck('title', 'id'))
          ->required()
          ->native(false),
        Select::make('tags')
          ->label('Bidang Produk')
          ->native(false)
          ->relationship(
            name: 'tags',
            titleAttribute: 'name',
          )
          ->createOptionForm([
            TextInput::make('name')
              ->label('Tag')
              ->placeholder('Tag')
              ->maxLength(30)
              ->helperText('Max: 30 Karakter')
              ->live(onBlur: true)
              ->unique()
              ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
            TextInput::make('slug')
              ->label('Slug')
              ->placeholder('Slug')
              ->unique(ignoreRecord: true)
              ->disabled()
              ->dehydrated()
              ->readOnly()
              ->required(),
          ]),
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
        FileUpload::make('image_product')
          ->label('Gambar Produk')
          ->maxSize(1024)
          ->directory('products')
          ->image()
          ->openable()
          ->downloadable()
          ->helperText('Maksimal ukuran file 1000KB atau 1MB'),
        Textarea::make('description')
          ->autosize()
          ->rows(1)
          ->label('Keterangan Pendek')
          ->maxLength(300),
        FileUpload::make('image_highlight')
          ->label('Gambar Ilustrasi')
          ->maxSize(1024)
          ->directory('products/highlight')
          ->image()
          ->openable()
          ->downloadable()
          ->helperText('Maksimal ukuran file 1000KB atau 1MB'),
        RichEditor::make('highlight')
          ->label('Keterangan Produk (Highlight)')
          ->maxLength(5000),
        Grid::make('1')
          ->schema([
            Repeater::make('specifications')
              ->label('Spesifikasi Teknis')
              ->schema([
                FileUpload::make('document')
                  ->label('File')
                  ->maxSize(5120)
                  ->openable()
                  ->downloadable()
                  ->directory('products/documents')
                  ->helperText('Maksimal ukuran: 5MB'),
                TextInput::make('title')
                  ->label('Judul File Spesifikasi'),
              ])
              ->addActionLabel('Tambah File Spesifikasi')
              ->reorderable()
              ->grid(2)
              ->required(),
          ])->columnSpanFull(),
        Grid::make('1')
          ->schema([
            Repeater::make('features')
              ->label('Fitur Produk')
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
                TextInput::make('title')
                  ->label('Nama Fitur'),
                Textarea::make('description')
                  ->autosize()
                  ->rows(1),
              ])
              ->reorderable()
              ->grid(3)
              ->required()
              ->addActionLabel('Tambah Fitur'),
          ])->columnSpanFull(),

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
        TextColumn::make('tags.name')
          ->label('Tag')
          ->searchable(),
        TextColumn::make('created_at')
          ->label('Dibuat')
          ->date('d F Y')
          ->sortable()
          ->toggleable()
          ->toggleable(isToggledHiddenByDefault: true),
        TextColumn::make('updated_at')
          ->label('Diperbarui')
          ->date('d F Y')
          ->sortable()
          ->toggleable()
          ->toggleable(isToggledHiddenByDefault: true),
      ])
      ->actions([
        Tables\Actions\ActionGroup::make([
          Tables\Actions\EditAction::make(),
          Tables\Actions\DeleteAction::make(),
        ])
      ])
      ->defaultPaginationPageOption(25);
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
