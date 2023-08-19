<?php

use Illuminate\Support\Str;
use App\Models\Boutique;
use App\Models\Detailcommande;

// crétion des conctantes pour gérer les affichages des pages
// avec livewire pour les pages list, edit et create

// recupérer le nom complet du user
function user_full_name()
{
    return auth()->user()->first_name . " " . auth()->user()->last_name;
}
// récupérer l'id du user
function user_id()
{
    return auth()->user()->id;
}

// recuperer les roles de l'utilisateur si il a plusieurs roles
function get_user_role_name()
{
    $roles_name = "";
    $i = 0;
    foreach (auth()->user()->r_user_role as $role) {
        $roles_name .= $role->nom_role;
        if ($i < count(auth()->user()->r_user_role) - 1) {
            $roles_name .= ",";
        }
        $i++;
    }
    return $roles_name;
}

// vérifier si une variable contient une string 
function contains($container, $contenu)
{
    return Str::contains($container, $contenu);
}

// récupérer le nom de la route de l'utilisateur
// et vérifie si elle contien une string(celle que l'on veut vérifier)
function set_menu_class($route, $class)
{
    $route_actuel = request()->route()->getName();
    if (contains($route_actuel, $route)) {
        return $class;
    }
    return "";
}
// récupère la route actuele et virifie si elle est égale à la route 
// passée en paramètre si oui, retourne la classe active 
function set_menu_active($route)
{
    $route_actuel = request()->route()->getName();
    if ($route_actuel === $route) {
        return 'active';
    }
    return "";
}


// fonction de récupétations des détails de la commande courante
// function get_commande_details()
// {
//     return Detailcommande::all()->toArray();
// }

//fuction de récupération de boutique de l'utilisateur
function get_user_boutique_name()
{
    return auth()->user()->r_user_boutique->id;
}
