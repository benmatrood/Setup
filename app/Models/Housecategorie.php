<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Housecategorie extends Model
{
    use HasFactory;
    // relation un a plusieurs entre Housecategorie et house
    // qui retoune les info des Housecategorie avec leurs houses
    public function r_housecategorie_house()
    {
        return $this->hasMany(House::class, "housecategorie_id", "id");
    }
}
