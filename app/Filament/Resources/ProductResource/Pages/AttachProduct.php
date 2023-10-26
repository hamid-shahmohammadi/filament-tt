<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Models\Product;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Filament\Resources\Pages\Page;
use App\Filament\Resources\ProductResource;
use App\Models\Attach;

class AttachProduct extends Page
{
    use WithFileUploads;

    protected static string $resource = ProductResource::class;

    protected static string $view = 'filament.resources.product-resource.pages.attach-product';

    public $product;
    public $flash=null;

    #[Rule('required|image|max:1024')] // 1MB Max
    public $photo;

    public function mount($record)
    {
        $this->product = Product::find($record);
    }

    public function uploadFile()
    {
        $validated = $this->validate([
            'photo' => 'required|image|max:1024',
        ]);
        $size = $this->photo->getSize();
        $name = $this->photo->getClientOriginalName();
        $mime = $this->photo->getClientOriginalExtension();

        $path = $this->photo->store('public/photos');

        $path = basename($path);

        Attach::create([
            'name' => $name,
            'path' => $path,
            'size' => $size,
            'mime' => $mime,
            'product_id' => $this->product->id
        ]);

        $this->flash='آپدیت با موفقیت انجام شد';
    }
}
