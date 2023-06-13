<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Importez la classe Session
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Change locale language
Route::get('/welcome-message', function (Request $request) {
    // Ajoutez une variable à la session
    Session::put('langue', $request->lang);
    $lang = $request->query('lang', 'fr');
    app()->setLocale($lang);
    return response()->json(['message' => trans('messages')]);
});
