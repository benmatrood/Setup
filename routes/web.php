<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/index', function () {
    return inertia('Index');
})->name('index');

Route::get('/role', function () {
    return inertia('Data/Role');
})->name('data.role');

Route::get('/permission', function () {
    return inertia('Data/Permission');
})->name('data.permission');

Route::get('/', function () {
    return inertia('Test');
})->name('home');

// Route::get('/', function () {
//     return view('welcome');
// });