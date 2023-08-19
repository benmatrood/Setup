<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;
    protected $guarded = [];
    // relation un a un  entre Bookings et booking_status
    // qui retoune les info de chaque Bookings avec les booking_status
    public function r_booking_bookingstatus()
    {
        return $this->belongsTo(Bookingstatus::class);
        // return $this->belongsTo(Bookingstatus::class, "bookingstatus", "bookingstatu_id", "id");
    }
    //
    public function r_booking_user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
    //Relation entre Bookings et Billings
    public function r_booking_billings()
    {
        return $this->hasMany(Billings::class);
    }
    //Relation entre Bookings et Houses
    public function r_booking_houses()
    {
        return $this->belongsTo(Houses::class, "house_id", "id");
    }
}
