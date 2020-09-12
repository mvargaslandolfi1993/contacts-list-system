<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/create-contact', [App\Http\Controllers\ContactController::class, 'createContact'])->name('contact');
Route::get('/update-contact/{id}', [App\Http\Controllers\ContactController::class, 'showContactForUpdate']);
Route::post('/update-contact/', [App\Http\Controllers\ContactController::class, 'updateContact']);
Route::get('/delete-contact/{id}', [App\Http\Controllers\ContactController::class, 'deleteContact']);
Route::get('/search', [App\Http\Controllers\ContactController::class, 'getContactByName']);
