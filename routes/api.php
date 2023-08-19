<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Importez la classe Session
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

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

Route::post('locale', function () {
    // Validate
    $validated = request()->validate([
        'lang' => ['required', 'in:fr,en'],
    ]);
    // Set locale
    App::setLocale($validated['lang']);
    app()->setLocale($validated['lang']);
    // Session
    session()->put('locale', $validated['lang']);
    // Response
    return redirect()->back();
});
