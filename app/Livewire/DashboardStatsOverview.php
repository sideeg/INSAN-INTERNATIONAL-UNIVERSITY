<?php

namespace App\Filament\Widgets;

use App\Models\Programme;
use App\Models\NewsArticle;
use App\Models\Event;
use App\Models\NewsletterSubscriber;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Active Programmes', Programme::where('is_active', true)->count())
                ->description('Across all levels')
                ->descriptionIcon('heroicon-m-academic-cap')
                ->color('success'),

            Stat::make('Published News', NewsArticle::where('is_published', true)->count())
                ->description('Featured and standard articles')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('info'),

            Stat::make('Upcoming Events', Event::where('start_date', '>=', now())->count())
                ->description('Events scheduled in the future')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('warning'),

            Stat::make('Newsletter Subscribers', NewsletterSubscriber::count())
                ->description('Total captured emails')
                ->descriptionIcon('heroicon-m-users')
                ->color('primary'),
        ];
    }
}