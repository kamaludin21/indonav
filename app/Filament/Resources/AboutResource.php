<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutResource\Pages;
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

class AboutResource extends Resource
{
    protected static ?string $model = CompanyProfile::class;
    protected static ?string $navigationGroup = 'Sistem';
    protected static ?string $navigationLabel = 'Visi & Misi';
    protected static ?string $slug = 'visi-dan-misi';
    protected static ?string $modelLabel = 'Visi & Misi';
    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';
    protected static ?int $navigationSort = 2;

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
                Grid::make('1')
                    ->schema([
                        Repeater::make('content')
                            ->label('Konten')
                            ->schema([
                                TextInput::make('title')
                                    ->label('Title')
                                    ->placeholder('Title')
                                    ->maxLength(300)
                                    ->helperText('Maksimal 300 Karakter'),
                                Textarea::make('subtitle')
                                    ->autosize()
                                    ->rows(3)
                                    ->label('Subtitle')
                                    ->maxLength(500)
                                    ->helperText('Maksimal 500 Karakter'),
                            ])
                            ->defaultItems(2)
                            ->reorderable()
                            ->grid(2),
                    ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                $query->whereNotIn('slug', ['company-journey']);
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
                    ->wrap()
                    ->lineClamp(2)
                    ->searchable(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListAbouts::route('/'),
            'create' => Pages\CreateAbout::route('/create'),
            'edit' => Pages\EditAbout::route('/{record}/edit'),
        ];
    }
}
