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
##
```
Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('categories')->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->unsignedSmallInteger('position')->default(0);
            $table->boolean('is_visible')->default(false);
            $table->string('seo_title', 60)->nullable();
            $table->string('seo_description', 160)->nullable();
            $table->timestamps();
        });
```
