<?php

use App\Http\Controllers\RestoController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', [RestoController::class, 'index'])->name('index');
Route::get('/show-menu', [RestoController::class, 'menu'])->name('menu');
Route::get('/show-categorie', [RestoController::class, 'categorie'])->name('categorie');
Route::get('/show-menu-to-categorie/{id}', [RestoController::class, 'menuToCat'])->name('menuToCat');


Route::get('/book-a-table', [RestoController::class, 'reservation'])->name('reservation');
Route::post('/book-a-table', [RestoController::class, 'create'])->name('reservation');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/delete-reservation/{id}', [App\Http\Controllers\HomeController::class, 'delRes'])->name('delRes');


Route::get('/ajouter-un-menu', [App\Http\Controllers\HomeController::class, 'menu'])->name('addmenu');
Route::post('/ajouter-un-menu', [App\Http\Controllers\HomeController::class, 'createMenu'])->name('addmenu');
Route::get('/delete-une-menu/{id}', [App\Http\Controllers\HomeController::class, 'delMenu'])->name('delMenu')->whereNumber('id');
Route::post('/update-une-menu/{id}', [App\Http\Controllers\HomeController::class, 'updateMenu'])->name('updateMenu')->whereNumber('id');


Route::get('/ajouter-une-categorie', [App\Http\Controllers\HomeController::class, 'categorie'])->name('addcategorie');
Route::post('/ajouter-une-categorie', [App\Http\Controllers\HomeController::class, 'createCat'])->name('addcategorie');
Route::get('/delete-une-categorie/{id}', [App\Http\Controllers\HomeController::class, 'delCat'])->name('delCat')->whereNumber('id');
Route::post('/update-une-categorie/{id}', [App\Http\Controllers\HomeController::class, 'updateCat'])->name('updateCat')->whereNumber('id');


Route::get('/ajouter-une-table', [App\Http\Controllers\HomeController::class, 'table'])->name('addtable');
Route::post('/ajouter-une-table', [App\Http\Controllers\HomeController::class, 'createTable'])->name('addtable');
Route::get('/delete-une-table/{id}', [App\Http\Controllers\HomeController::class, 'delTable'])->name('delTable')->whereNumber('id');
Route::post('/update-une-table/{id}', [App\Http\Controllers\HomeController::class, 'updateTable'])->name('updateTable')->whereNumber('id');
