<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    // relation plusieurs a plusieurs entre users et roles
    // qui retoune les info des users  avec les roles
    public function r_user_role()
    {
        return $this->belongsToMany(Roles::class, "user_role", "user_id", "role_id");
    }
    // relation plusieurs a plusieurs entre  users et permissions 
    // qui retoune les info des users  avec les permissions
    public function r_user_permission()
    {
        return $this->belongsToMany(Permissions::class, "user_permission", "user_id", "permission_id");
    }
    // relation un a plusieurs entre users et commandes(orders)
    // qui retoune les info des users avec leurs commandes
    public function r_user_order()
    {
        return $this->hasMany(Orders::class, "order_id", "id");
    }
    // relation un a un  entre users et Billings(Faturations)
    // qui retoune les info de chaque Faturations avec les users
    public function r_user_billing()
    {
        return $this->belongsTo(Billings::class, "billing_id", "id");
    }
    // relation un a un  entre users et Bookings(Réservations)
    // qui retoune les info de chaque Réservations avec les users
    public function r_user_booking()
    {
        return $this->hasMany(Bookings::class, "booking_id", "id");
    }
    // relation un a un  entre users et restorantes
    // qui retoune les info de chaque restorants avec les users
    public function r_user_restorant()
    {
        return $this->belongsTo(Restorants::class, "restorant_id", "id");
    }
    // relation un a un  entre users et companies
    // qui retoune les info de chaque companies avec les users
    public function r_user_companie()
    {
        return $this->belongsTo(Companies::class, "companie_id", "id");
    }
}
