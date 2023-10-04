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
## app/Filament/Resources/ProductResource.php
```
protected static ?string $navigationGroup = 'فروشگاه';
protected static ?int $navigationSort = 4;

public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('category_id')
                ->label('Category')
                ->relationship('category', 'name')
                ->searchable()
                ->placeholder('Select category')
                ->preload(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->live()
                    ->afterStateUpdated(function (Set $set, $state) {
                        $set('slug', Str::slug($state));
                    }),
                    Forms\Components\TextInput::make('slug')                    
                    ->dehydrated()
                    ->required()
                    ->unique(Category::class, 'slug', ignoreRecord: true),
                    Textarea::make('description'),
                    TextInput::make('price')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('price')
            ])
```
