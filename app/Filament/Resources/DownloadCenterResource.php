<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DownloadCenterResource\Pages;
use App\Filament\Resources\DownloadCenterResource\RelationManagers;
use App\Models\DownloadCenter;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DownloadCenterResource extends Resource
{
    protected static ?string $model = DownloadCenter::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box-arrow-down';

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
                    ->required(),
                Select::make('category')
                    ->options([
                        'surveying_and_engineering' => 'Surveying and Engineering',
                        '3d_modelling' => '3D Modelling',
                        'hidrografi' => 'Hidrografi',
                        'video_tutorial' => 'Video Tutorial',
                    ])
                    ->native(false)
                    ->required(),
                Select::make('type')
                    ->options([
                        'firmware' => 'Firmware',
                        'board_firmware' => 'Board Firmware',
                        'software' => 'Software',
                        'manual' => 'Manual',
                        'video_tutorial' => 'Video Tutorial',
                    ])
                    ->native(false)
                    ->required(),
                FileUpload::make('file_url')
                    ->label('File (Diutamakan format MP4 untuk video tutorial)')
                    ->openable()
                    ->maxSize(102288)
                    ->downloadable()
                    ->directory('download_center')
                    ->required()
                    ->helperText('Maksimal ukuran file 102288KB atau 102MB'),
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
                TextColumn::make('category')
                    ->searchable(),
                TextColumn::make('type')
                    ->searchable(),
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
            'index' => Pages\ListDownloadCenters::route('/'),
            'create' => Pages\CreateDownloadCenter::route('/create'),
            'edit' => Pages\EditDownloadCenter::route('/{record}/edit'),
        ];
    }
}
