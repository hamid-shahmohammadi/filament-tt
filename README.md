## multi panel

```
Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name',64);
            $table->string('family',64);
            $table->string('father',16)->nullable();
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
## php artisan make:filament-page CustomerLogin
