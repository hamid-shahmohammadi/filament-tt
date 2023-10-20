## cmd
```
php artisan make:filament-page AttachProduct --resource=ProductResource --type=custom
```
## ProductResource
```
->actions([
    Tables\Actions\EditAction::make(),
    Tables\Actions\Action::make('attach')->label('attach')
    ->url(fn (Model $record): string => route('filament.admin.resources.products.Attach',  ['record' => $record]))
])

public static function getPages(): array
{
    return [
        'index' => Pages\ListProducts::route('/'),
        'create' => Pages\CreateProduct::route('/create'),
        'edit' => Pages\EditProduct::route('/{record}/edit'),
        'Attach' => Pages\AttachProduct::route('/{record}/attach'),
    ];
}   
```

## AttachProduct
```
public $record;
    public $product;
   
    public $photo;
    public $name;

    public function mount($record)
    {
        $this->$record = $record;
        $this->product = Product::with('attachs')->find($record);
        
        

    }
    public function save()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);
        $name=$this->photo->getClientOriginalName();
        $size=$this->photo->getSize();
        $mime=$this->photo->getClientOriginalExtension();
      
        

        $path=$this->photo->store('public/photos');
        
        $path=basename($path);
        ProductAttach::create([
            'name'=>$name,
            'path'=>$path,
            'size'=>$size,
            'mime'=>$mime,
            'product_id'=>$this->product->id
        ]);
    }
```
