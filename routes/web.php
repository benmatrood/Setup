<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BureauController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LangController;
use App\Models\Houses;
use App\Models\User;
use App\Models\Roles;
use App\Models\Housetype;
use App\Models\Companies;

//Route index de l'app
Route::get('/', function () {
    return inertia('Frontend/Index');
})->name('home');
//Route groupe des utilisteurs non authentifier
Route::middleware('guest')->group(function () {
    //Route de d'affichage du login 
    Route::get('/login', [AuthController::class, "showLogin"])->name("login");
    //Route de connexion
    Route::post('user/login', [AuthController::class, "authenticate"])->name("login.user");

    //Route d'affichage de la page Partenaires Register
    Route::get('/paretainer/register', function () {
        return inertia('Auth/PartenairesRegister');
    })->name('register.partener');
    //Route d'affichage de la page Register des users
    Route::get('/register', function () {
        return inertia('Auth/Register');
    })->name('register');
});

//Route groupe des utilisteurs authentifier
Route::middleware('auth')->group(function () {
    //Route de déconexion
    Route::post('/logout', [AuthController::class, "logout"])->name("logout");
});

//Route des users du Bureau
// Route::middleware(['auth', 'role:admin'])->group(function () {
Route::middleware('auth')->group(function () {
    //Route d'accès au dashborsd bureau
    Route::get('/bureau/admin', [BureauController::class, "index"])->name("admin.bureau");
    // Route d'accès a la liste des users
    Route::get('/bureau/user', [BureauController::class, "userListe"])->name("user.bureau");
    // Route d'accès a la liste des restaurants
    Route::get('/bureau/resto', [BureauController::class, "restoListe"])->name("resto.bureau");
    // Route d'accès a la liste des hotels & résidences
    Route::get('/bureau/hotel', [BureauController::class, "hotelListe"])->name("hotel.bureau");
    //Route d'accès a la liste des réservations (Hotels & Résidences)
    Route::get('/bureau/reservation', [BureauController::class, "reservationListe"])->name("reservation.bureau");
    // Route d'accès a la liste des commandes (Restaurants)
    Route::get('/bureau/commande', [BureauController::class, "commandeListe"])->name("commande.bureau");
});








Route::get('/index', function () {

    return inertia('Index');
})->name('index');

Route::get('/role', function () {
    return inertia('Data/Role');
})->name('data.role');

Route::get('/permission', function () {
    return inertia('Data/Permission');
})->name('data.permission');


Route::get('/toto', [Controller::class, "index"])->name('toto.index');

Route::get('/test', function () {
    return inertia('Test');
})->name('test');


Route::get('/titi', function () {
    return Housetype::with("r_housetype_house")->get();
});
Route::get('/user', function () {
    return User::with("r_user_role")->get();
});
Route::get('/resto', function () {
    return Companies::all();
});
