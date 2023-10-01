## cmd
```
php artisan make:filament-resource Customer --generate
```
## /app/Models/Category.php
```
protected $fillable=['parent_id','name','slug','description','position',
        'is_visible','seo_title','seo_description'];

public function parent(): BelongsTo
{
    return $this->belongsTo(Category::class, 'parent_id');
}
```
## /app/Filament/Resources/CategoryResource.php
```
Forms\Components\Select::make('parent_id')
            ->label('Parent')
            ->relationship('parent', 'name', fn (Builder $query) => $query->where('parent_id', null))
            ->searchable()
            ->placeholder('Select parent category'),
Forms\Components\TextInput::make('name')
    ->required()
    ->maxLength(255)
    ->live()
    ->afterStateUpdated(function (Set $set, $state) {
        $set('slug', Str::slug($state));
    }),
```
