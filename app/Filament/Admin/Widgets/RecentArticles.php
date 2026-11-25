<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Article;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class RecentArticles extends TableWidget
{
    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Article::query()
                ->with(['author', 'categories']))
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                TextColumn::make('author.name')
                    ->label('Author'),

                TextColumn::make('categories.title')
                    ->label('Categories')
                    ->badge(),

                TextColumn::make('created_at')
                    ->label('Published Date')
                    ->date('M d, Y')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->paginated([5, 10, 25])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ]);
    }
}
