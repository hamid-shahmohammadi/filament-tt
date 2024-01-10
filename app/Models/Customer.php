<?php

namespace App\Models;

use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Filament\Models\Contracts\FilamentUser;

class Customer extends Authenticatable implements FilamentUser
{
    use HasFactory;
    protected $guard = "customer";

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    protected $hidden = [
        'password',
    ];
    protected $casts = [
        'password' => 'hashed',
    ];
    public function canAccessPanel(Panel $panel) : bool
    {
        return true;
    } 
}
