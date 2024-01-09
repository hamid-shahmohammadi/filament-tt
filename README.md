## multi panel

```
Schema::create('customers', function (Blueprint $table) {
    $table->id();
    $table->string('name',64);
    $table->string('family',64);          
    $table->string('email',64)->unique();
    $table->string('username',64)->unique();
    $table->string('password',128);    
    $table->boolean('active');
    $table->timestamp('email_verified_at')->nullable();
    $table->rememberToken();
    $table->timestamps();
});
```

## terminal

```
php artisan make:seeder CustomerSeeder
```
## /home/shah/sec/bt-10/database/seeders/CustomerSeeder.php
```
$faker = Factory::create();
foreach (range(1, 10) as $index) {
    DB::table('customers')->insert([
        'name' => $faker->firstName,
        'family' => $faker->lastName,
        'email' => $faker->email,
        'username' => random_int(1000000000, 9999999999),
        'national_code' => random_int(1000000000, 9999999999),
        'password' => Hash::make('password'),
        'active' => true
    ]);
}
## /home/shah/sec/bt-10/database/seeders/DatabaseSeeder.php
```
$this->call([
    CustomerSeeder::class
]);
```
## terminal
```
php artisan make:filament-panel customer
```
## /home/shah/sec/bt-10/app/Providers/Filament/CustomerPanelProvider.php
```
   return $panel
            ->id('customer')
            ->path('customer')
            ->login()
            ->authGuard('customer')
```
## /home/shah/sec/bt-10/app/Models/Customer.php
```
class Customer extends Authenticatable
{
    use HasApiTokens,HasFactory;
```
## /home/shah/sec/bt-10/config/auth.php
```
'guards' => [
    'web' => [
        'driver' => 'session',
        'provider' => 'users',
    ],
    'customer' => [
        'driver' => 'session',
        'provider' => 'customers',
    ],
],
'providers' => [
    'users' => [
        'driver' => 'eloquent',
        'model' => App\Models\User::class,
    ],
    'customers' => [
        'driver' => 'eloquent',
        'model' => App\Models\Customer::class,
    ],       
],
'passwords' => [
    'users' => [
        'provider' => 'users',
        'table' => 'password_reset_tokens',
        'expire' => 60,
        'throttle' => 60,
    ],
    'customers' => [
        'provider' => 'customers',
        'table' => 'password_reset_tokens',
        'expire' => 60,
        'throttle' => 60,
    ],
],
```
