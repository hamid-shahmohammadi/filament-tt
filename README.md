## attach
```
Schema::create('attaches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('path');
            $table->string('size');
            $table->string('mime');
            $table->foreignId('product_id')->nullable();
            $table->timestamps();
        });
```
## Attach
```
protected $fillable = [
        'name',
        'path',
        'size',
        'mime',
        'product_id'
    ];
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
```
