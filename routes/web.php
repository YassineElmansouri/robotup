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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/afficher_users', [App\Http\Controllers\User_Controller::class,'afficher_users'])->name('afficher_users');
Route::post('/ajouter_role', [App\Http\Controllers\User_Controller::class,'ajouter_role'])->name('ajouter_role');
Route::post('/ajouter_profession', [App\Http\Controllers\User_Controller::class,'ajouter_profession'])->name('ajouter_profession');

Route::get('/registerr', [App\Http\Controllers\register_Controller::class,'dropdown_content'])->name('register_content');
Route::post('/update-valide/{id}/{status}', [App\Http\Controllers\User_Controller::class, 'updatevalide'])->name('updatevalide');