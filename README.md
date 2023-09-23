## app/Filament/Resources/UserResource.php
```
Select::make('roles')
->multiple()
->relationship('roles', 'name')
->preload(),
```
## app/Filament/Resources/PermissionResource.php
```
 return $form
->schema([
    Card::make()->schema([
        TextInput::make('name')
        ->minLength(2)
        ->maxLength(255)
        ->required()
        ->unique(ignoreRecord:true)
    ])

]);

```
