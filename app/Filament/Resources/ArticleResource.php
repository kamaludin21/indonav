<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Set;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;
    protected static ?string $navigationGroup = 'Portofolio';
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

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
                Select::make('article_category_id')
                    ->relationship('category', 'name')
                    ->native(false)
                    ->preload()
                    ->required(),
                FileUpload::make('image')
                    ->label('Gambar')
                    ->maxSize(500)
                    ->directory('news/' . now()->format('Y-m'))
                    ->image()
                    ->imageEditor()
                    ->openable()
                    ->downloadable()
                    ->helperText('Maks Size: 500KB')
                    ->required(),
                RichEditor::make('content')
                    ->label('Konten')
                    ->maxLength(5000)
                    ->helperText('Maks Kata: 5000')
                    ->disableToolbarButtons([
                        'codeBlock',
                    ])
                    ->required()
                    ->columnSpanFull(),
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
                ImageColumn::make('image'),
                TextColumn::make('category.name')
                    ->label('Kategori'),

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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
