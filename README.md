## multi panel

```
Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name',64);
            $table->string('family',64);          
            $table->string('email',64)->unique();
            $table->string('username',64)->unique();
            $table->string('password',128);         
            $table->foreignId('user_id')->nullable()->constrained('users');     
            $table->boolean('active');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
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
