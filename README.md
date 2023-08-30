## cmd
```
php artisan make:filament-resource Role
```
## Models/Role.php

## app/Filament/Resources/RoleResource.php
```
return $form
            ->schema([

                TextInput::make('name')
                    ->minLength(2)
                    ->maxLength(255)->unique(ignoreRecord: true),
                Select::make('permissions')
                    ->multiple()
                    ->relationship('permissions', 'name')
                    ->preload(),

            ]);

return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('name')->label('نام'),
                TextColumn::make('created_at')
                    ->dateTime('d-M-Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

```
