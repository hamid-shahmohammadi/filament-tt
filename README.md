## app/Models/User.php
```
 public function canAccessPanel(Panel $panel) : bool
    {
        return $this->hasRole(['Admin','User']);
    }
```
## app/Filament/Resources/RoleResource.php
```
public static function getEloquentQuery(): Builder
{
    return parent::getEloquentQuery()->where('name', '!=','Admin');
}
```

## php artisan make:policy CategoryPolicy --model=Category
```
 public function viewAny(User $user): bool
    {
        if($user->hasRole('Admin') || $user->hasPermissionTo('Create Category')){
            return true;
        }
        return false;
    }
public function forceDelete(User $user, Category $category): bool
    {
        return $user->hasRole('Admin');
    }
```
