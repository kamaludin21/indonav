<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Filament\Resources\GalleryResource\RelationManagers;
use App\Models\Gallery;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;
    protected static ?string $navigationGroup = 'Konten Website';
    protected static ?int $navigationSort = 7;
    protected static ?string $navigationIcon = 'heroicon-o-archive-box';
    protected static ?string $navigationLabel = 'Kaleidoskop Survey';
    protected static ?string $pluralModelLabel = 'Kaleidoskop Survey';
    protected static ?string $modelLabel = 'Kaleidoskop Survey';
    protected static ?string $slug = 'kaleidoskop-survey';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Textarea::make('title')
                    ->autosize()
                    ->rows(1)
                    ->label('Judul')
                    ->maxLength(250)
                    ->helperText('Maksimal 250 Karakter')
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                    ->required(),
                TextInput::make('slug')
                    ->label('Slug')
                    ->placeholder('Slug')
                    ->unique(ignoreRecord: true)
                    ->disabled()
                    ->dehydrated()
                    ->readOnly()
                    ->required(),
                Grid::make('1')
                    ->schema([
                        Repeater::make('images')
                            ->label('Gambar')
                            ->defaultItems(3)
                            ->schema([
                                FileUpload::make('image')
                                    ->label('Gambar')
                                    ->maxSize(500)
                                    ->directory('gallery/' . now()->format('Y-m'))
                                    ->image()
                                    ->imageEditor()
                                    ->openable()
                                    ->downloadable()
                                    ->helperText('Maks Size: 500KB')
                                    ->required(),
                                Textarea::make('description')
                                    ->label('Deskripsi')
                                    ->autosize()->rows(1),
                            ])
                            ->reorderable()
                            ->grid(3)
                            ->required(),
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
                    ->searchable()
                    ->limit(40),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
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
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}
