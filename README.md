## cmd
```
php artisan make:filament-relation-manager CategoryResource products name
```
## filament-tt/app/Models/Category.php
```
public function products(): HasMany
{
    return $this->hasMany(Product::class);
}
```
## app/Filament/Resources/CategoryResource.php
```
public static function getRelations(): array
{
    return [
        ProductsRelationManager::class
    ];
}
```
