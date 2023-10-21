<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Models\Product;
use Filament\Resources\Pages\Page;

class AttachProduct extends Page
{
    protected static string $resource = ProductResource::class;

    protected static string $view = 'filament.resources.product-resource.pages.attach-product';

    public $product;

    public function mount($record){
        $this->product=Product::find($record);
    }

    
}
