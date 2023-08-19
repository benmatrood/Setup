<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Houses extends Model
{
    use HasFactory;
    // relation un a un  entre House et Type_house
    // qui retoune les info de chaque House avec les Type_house
    public function r_house_type_house()
    {
        return $this->belongsTo(Housetype::class, "housetype_id", "id");
    }
    // relation un a un  entre House et house_categorie
    // qui retoune les info de chaque House avec les house_categorie
    public function r_house_categorie_house()
    {
        return $this->belongsTo(Housecategorie::class, "housecategorie_id", "id");
    }
    //relation entre house et companie
    public function r_house_companie()
    {
        return $this->belongsTo(Companies::class, "companie_id", "id");
    }
}
