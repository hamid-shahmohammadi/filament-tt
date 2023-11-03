<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CountOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $productCount = Product::count();
        $categoryCount=Category::count();
        $userCount=User::count();
        return [
            Stat::make('Product Count:', $productCount)
            ->description('increase')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success')
            ->chart([7, 2, 10, 3, 15, 4, 17]),
            Stat::make('Categry Count:', $categoryCount)
            ->description('increase')
            ->descriptionIcon('heroicon-m-arrow-trending-down')
            ->color('danger')
            ->chart([7, 2, 10, 3, 15, 4, 17]),
            Stat::make('User Count:', $userCount)
            ->description('increase')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success')
            ->chart([7, 2, 10, 3, 15, 4, 17]),
        ];
    }
}
