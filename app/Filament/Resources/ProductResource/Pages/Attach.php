<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Models\Attach as ProductAttach;
use App\Models\Product;
use Filament\Resources\Pages\Page;
use App\Filament\Resources\ProductResource;

class Attach extends Page
{
    protected static string $resource = ProductResource::class;

    protected static string $view = 'filament.resources.product-resource.pages.attach';
    
    
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
}
