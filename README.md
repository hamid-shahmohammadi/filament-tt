## cmd
```
php artisan make:filament-resource Customer --generate
```
## /home/shah/sec/filament-tt/app/Models/Category.php
```
protected $fillable=['parent_id','name','slug','description','position',
        'is_visible','seo_title','seo_description'];

public function parent(): BelongsTo
{
    return $this->belongsTo(Category::class, 'parent_id');
}
```
