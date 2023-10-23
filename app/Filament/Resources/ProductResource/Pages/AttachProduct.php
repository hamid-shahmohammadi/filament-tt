<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Models\Product;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Filament\Resources\Pages\Page;
use App\Filament\Resources\ProductResource;

class AttachProduct extends Page
{
    use WithFileUploads;

    protected static string $resource = ProductResource::class;

    protected static string $view = 'filament.resources.product-resource.pages.attach-product';

    public $product;

    #[Rule('image|max:1024')] // 1MB Max
    public $photo;

    public function mount($record){
        $this->product=Product::find($record);
    }

    public function uploadFile(){
        dd($this->photo->getSize());
    }
}
