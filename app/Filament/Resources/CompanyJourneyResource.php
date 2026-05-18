<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyJourneyResource\Pages;
use App\Models\CompanyProfile;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Set;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Str;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class CompanyJourneyResource extends Resource
{
    protected static ?string $model = CompanyProfile::class;
    protected static ?string $navigationGroup = 'Sistem';
    protected static ?string $navigationIcon = 'heroicon-o-folder';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationLabel = 'Riwayat Perusahaan';
    protected static ?string $pluralModelLabel = 'Riwayat Perusahaan';
    protected static ?string $modelLabel = 'Riwayat Perusahaan';
    protected static ?string $slug = 'riwayat-perusahaan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Textarea::make('name')
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
                Textarea::make('description')
                    ->label('Keterangan')
                    ->rows(1)
                    ->columnSpanFull(),
                Grid::make('2')
                    ->schema([
                        Repeater::make('content')
                            ->label('Konten')
                            ->schema([
                                TextInput::make('year')
                                    ->label('Tahun')
                                    ->numeric()
                                    ->required(),

                                TextInput::make('tag')
                                    ->label('Tag')
                                    ->placeholder('Contoh: Beginning, First Reward, dll.'),

                                TextInput::make('title')
                                    ->label('Judul')
                                    ->required(),

                                Textarea::make('subtitle')
                                    ->label('Sub Judul')
                                    ->rows(2),
                            ])
                            ->defaultItems(2)
                            ->reorderable(),
                    ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                $query->whereNotIn('slug', ['visi', 'misi']);
            })
            ->columns([
                TextColumn::make('index')
                    ->label('No.')
                    ->rowIndex(),
                TextColumn::make('name')
                    ->label('Judul')
                    ->searchable(),
                TextColumn::make('description')
                    ->label('Keterangan')
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
            'index' => Pages\ListCompanyJourneys::route('/'),
            'create' => Pages\CreateCompanyJourney::route('/create'),
            'edit' => Pages\EditCompanyJourney::route('/{record}/edit'),
        ];
    }
}
