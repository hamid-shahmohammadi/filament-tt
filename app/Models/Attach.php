<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attach extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'path',
        'size',
        'mime',
        'product_id'
    ];

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
