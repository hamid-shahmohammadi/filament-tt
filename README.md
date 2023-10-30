## cmd
```
php artisan make:filament-widget ProductCount --stats-overview
```
## /home/shah/sec/filament-tt/app/Filament/Widgets/ProductCount.php
```
class ProductCount extends BaseWidget
{
    protected function getStats(): array
    {
        $productCount = Product::count();
        $categryCount = Category::count();
        $userCount = User::count();
        return [
            Stat::make('Product Count:', $productCount)
                ->description('32k increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([7, 2, 10, 3, 15, 4, 17]),
            Stat::make('Category Count:', $categryCount)
                ->description('32k increase')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger')
                ->chart([7, 2, 10, 3, 15, 4, 17]),
            Stat::make('User Count:', $userCount)
                ->description('32k increase')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger')
                ->chart([7, 2, 10, 3, 15, 4, 17]),
        ];
    }
}
```
