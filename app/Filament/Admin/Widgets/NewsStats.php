<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Article;
use App\Models\Category;
use App\Models\Author;
use App\Models\Advertise;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class NewsStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Articles', Article::count())
                ->description('Published news articles')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('success'),

            Stat::make('Total Categories', Category::count())
                ->description('Available news categories')
                ->descriptionIcon('heroicon-m-folder')
                ->color('info'),

            Stat::make('Total Authors', Author::count())
                ->description('Registered authors')
                ->descriptionIcon('heroicon-m-users')
                ->color('warning'),

            Stat::make('Total Advertisements', Advertise::count())
                ->description('Managed advertisements')
                ->descriptionIcon('heroicon-m-megaphone')
                ->color('primary'),
        ];
    }
}
