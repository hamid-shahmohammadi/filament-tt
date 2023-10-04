## /database/migrations/2023_10_04_094450_create_products_table.php
```
Schema::create('products', function (Blueprint $table) {
    $table->id();
    $table->foreignId('category_id')->nullable();
    $table->string('name');
    $table->string('slug')->unique()->nullable();
    $table->longText('description')->nullable();
    $table->integer('price')->nullable();
    $table->timestamps();
});
```
## /app/Models/Product.php
```
protected $fillable=['category_id','name','slug','description','price'];

public function category(): BelongsTo
{
    return $this->belongsTo(Category::class, 'category_id');
}

```
