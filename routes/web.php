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
Route::get('/registerr', [App\Http\Controllers\register_Controller::class,'dropdown_content'])->name('register_content');
Route::middleware(['non_valide'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::middleware(['admin'])->group(function () {

        Route::get('/afficher_users', [App\Http\Controllers\User_Controller::class,'afficher_users'])->name('afficher_users');
        Route::post('/ajouter_role', [App\Http\Controllers\RolesController::class,'ajouter_role'])->name('ajouter_role');
        Route::post('/ajouter_profession', [App\Http\Controllers\ProfessionController::class,'ajouter_profession'])->name('ajouter_profession');
        Route::post('/update-valide/{id}/{status}', [App\Http\Controllers\User_Controller::class, 'updatevalide'])->name('updatevalide');

        Route::get('/afficher_roles', [App\Http\Controllers\RolesController::class,'afficher_roles'])->name('afficher_roles');
        Route::get('/edit_role/{id}', [App\Http\Controllers\RolesController::class,'edit_role'])->name('edit_role');
        Route::put('/update_role/{id}', [App\Http\Controllers\RolesController::class,'update_role'])->name('update_role');
        Route::delete('/Delete_role/{id}', [App\Http\Controllers\RolesController::class,'Delete_role'])->name('Delete_role');

        Route::get('/afficher_profession', [App\Http\Controllers\ProfessionController::class,'afficher_profession'])->name('afficher_profession');
        Route::get('/edit_profession/{id}', [App\Http\Controllers\ProfessionController::class,'edit_profession'])->name('edit_profession');
        Route::put('/update_profession/{id}', [App\Http\Controllers\ProfessionController::class,'update_profession'])->name('update_profession');
        Route::delete('/Delete_profession/{id}', [App\Http\Controllers\ProfessionController::class,'Delete_profession'])->name('Delete_profession');
    });
});
Route::get('/non_valide', [App\Http\Controllers\Controller::class,'non_valide'])->name('non_valide')->middleware("auth");

Route::get('/test', function () {
    return view('admin.admin');
});