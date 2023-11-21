<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // $user = User::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'admin@admin.com',
        // ]);
        // User::factory()->create([
        //     'name' => 'User',
        //     'email' => 'user@user.com',
        // ]);
        // $role = Role::create(['name' => 'Admin']);
        // $user->assignRole($role);
        Customer::create([
            'name'=>'customer',
            'email'=>'cus@cus.com',
            'password'=>Hash::make('password')
        ]);

    }
}
