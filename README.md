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
