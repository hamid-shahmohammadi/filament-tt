## cmd
```
php artisan make:filament-page AttachProduct --resource=ProductResource --type=custom
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
