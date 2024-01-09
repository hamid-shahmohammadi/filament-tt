<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        foreach (range(1, 10) as $index) {
            DB::table('customers')->insert([
                'name' => $faker->firstName,
                'family' => $faker->lastName,
                'email' => $faker->email,
                'username' => random_int(1000000000, 9999999999),
                'password' => bcrypt('password'),
                'active' => true
            ]);
        }
    }
}
