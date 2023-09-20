## app/Filament/Resources/UserResource.php
```
Forms\Components\TextInput::make('password')
->password()
->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
->dehydrated(fn (?string $state): bool => filled($state))
->required(fn (string $operation): bool => $operation === 'create')
->maxLength(255),
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
