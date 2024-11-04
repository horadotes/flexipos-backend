<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasRoles, Notifiable;

    protected $fillable = [
        'role_id',
        'stripe_user_id',
        'firstname',
        'lastname',
        'email',
        'password',
    ];

    protected static function boot()
    {
        parent::boot();

        // Listen for the created event
        static::created(function ($user) {
            // Determine the designation based on role_id
            $designation = null;
            $faker = Faker::create();

            switch ($user->role_id) {
                case 1:
                    $designation = 'Owner';
                    break;
                case 2:
                    $designation = 'Admin';
                    break;
                case 3:
                    // Assign designation based on the user's role or any other logic
                    // You may need to define how to get the designation for a 'user'
                    $designation = 'User'; // or set this dynamically based on other criteria
                    break;
                default:
                    $designation = 'Unknown'; // Fallback designation
            }

            // Create a new Employee record
            Employee::create([
                'firstname' => $user->firstname,
                'lastname' => $user->lastname,
                'email' => $user->email,
                'phone' => $faker->phoneNumber, // Set a default value or leave it null
                'designation' => $designation,
                'is_active' => true, // Default value for is_active
            ]);
        });
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function privilege(): HasMany
    {
        return $this->hasMany(Privilege::class);
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    public function stripe_payment(): HasMany
    {
        return $this->hasMany(StripePayment::class);
    }
}
