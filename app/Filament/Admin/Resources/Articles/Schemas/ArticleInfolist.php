<?php

namespace App\Filament\Admin\Resources\Articles\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ArticleInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('slug'),
                TextEntry::make('author_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('content')
                    ->columnSpanFull(),
                ImageEntry::make('image'),
                TextEntry::make('meta_description'),
                TextEntry::make('meta_title'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
