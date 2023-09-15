<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as ModelsPermisson;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends ModelsPermisson
{
    use HasFactory;
}
