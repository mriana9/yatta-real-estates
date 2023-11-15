<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\RealEstateController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Models\RealEstate;

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

Route::get('link', function () {Artisan::call('storage:link');});

Route::get('/', function () {return view('welcome');});
Route::get('/home', function () { return view('welcome');})->name('home');
Route::get('/profile/edit', [ProfileController::class,'edit'])->name('profile.edit');
Route::put('/profile/update', [ProfileController:: class, 'update'])->name('profile.update');
Route::get('/profile', [ProfileController::class, 'show'])->name('profile');


Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::get('/register', [AuthManager::class, 'register'])->name('register');
Route::post('/register', [AuthManager::class, 'registerPost'])->name('register.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::get('/add-real-estate', [RealEstateController::class, 'addRealEstate'])->name('register');
Route::post('/add-real-estate',[RealEstateController::class, 'addRealEstatePost'])->name('add-real-estate.post');

Route::get('/all-real-estates', function () { return view('all-real-estates');})->name('all-real-estates');
Route::get('/add-real-estates', function () { return view('add-real-estates');})->name('add-real-estates');
Route::get('/contact', function () { return view('contact');})->name('contact');
Route::post('/contact',[ContactController::class, 'addContactPost'])->name('contact.post');
Route::get('/search', [RealEstateController::class, 'search'])->name('search');

Route::get('/real-estate/{id}', [RealEstateController::class, 'showRealEstateDetails'])->name('real-estate.details');

Route::delete('/real-estates/{id}', [RealEstateController::class, 'destroy'])->name('real-estates.destroy');
Route::post('/real-estates/confirm/{id}', [RealEstateController::class, 'confirm'])->name('real-estates.confirm');

Route::get('/real-estates/edit/{id}',[RealEstateController::class, 'edit'])->name('real-estates.edit');
Route::post('/real-estates/edit/{id}', [RealEstateController::class, 'update'])->name('real-estates.update');




Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
