<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServicePageResource\Pages;
use App\Filament\Resources\ServicePageResource\RelationManagers;
use App\Models\ServicePage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServicePageResource extends Resource
{
    protected static ?string $model = ServicePage::class;
    protected static ?string $navigationGroup = 'Layanan';
    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('Hero')
                    ->schema([

                        FileUpload::make('image')
                            ->image()
                            ->directory('services'),

                        Textarea::make('label')
                            ->autosize()
                            ->label('Nama Layanan')
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

                        TextInput::make('title')
                            ->required()
                            ->columnSpanFull(),
                    ]),

                Section::make('Output yang Anda Dapatkan')
                    ->schema([

                        Repeater::make('outputs')
                            ->schema([
                                TextInput::make('text')
                                    ->required()
                                    ->label('Output')
                            ])
                            ->defaultItems(3)
                            ->columnSpanFull(),

                        TagsInput::make('formats')
                            ->label('Format File')
                            // ->options([
                            //     'GeoTIFF' => 'GeoTIFF',
                            //     'LAS' => 'LAS',
                            //     'OBJ' => 'OBJ',
                            //     'JPG' => 'JPG',
                            //     'DXF' => 'DXF',
                            //     'PDF' => 'PDF',
                            // ])
                            ->placeholder('Ketik format (GeoTIFF) lalu tekan Enter')
                            ->helperText('Ketik format (GeoTIFF) lalu tekan Enter')
                            ->columnSpanFull(),
                    ]),

                Section::make('Konten Penjelasan')
                    ->schema([

                        Repeater::make('sections')
                            ->schema([

                                TextInput::make('title')
                                    ->required(),

                                RichEditor::make('content')
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'bulletList',
                                        'orderedList',
                                        'link',
                                    ])
                                    ->columnSpanFull(),

                            ])
                            ->defaultItems(2)
                            ->columnSpanFull(),

                    ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('index')
                    ->label('No.')
                    ->rowIndex(),
                TextColumn::make('label')
                    ->label('Layanan')
                    ->searchable(),
                TextColumn::make('title')
                    ->label('Judul Layanan')
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
            'index' => Pages\ListServicePages::route('/'),
            'create' => Pages\CreateServicePage::route('/create'),
            'edit' => Pages\EditServicePage::route('/{record}/edit'),
        ];
    }
}
