<?php

namespace App\Filament\Admin\Resources\Articles\Schemas;

use App\Models\Article;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                Select::make('author_id')
                    ->relationship('author', 'name')
                    ->searchable()
                    ->preload()
                    ->nullable(),

                Select::make('categories')
                    ->relationship('categories', 'title')
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->required(),

                RichEditor::make('content')
                    ->required()
                    ->columnSpanFull(),

                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('articles')
                    ->visibility('public')
                    ->imageEditor()
                    ->required(),

                TextInput::make('meta_title')
                    ->required()
                    ->maxLength(255),

                Textarea::make('meta_description')
                    ->required()
                    ->rows(3)
                    ->columnSpanFull(),
            ]);
    }
}
