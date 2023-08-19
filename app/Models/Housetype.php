<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Housetype extends Model
{
    use HasFactory;
    // relation un a plusieurs entre Housetype et house
    // qui retoune les info des Housetype avec leurs houses
    public function r_housetype_house()
    {
        return $this->hasMany(Houses::class, "id", "id");
    }
}
