<?php

use App\Http\Controllers\Admin\OfferController as AdminOfferController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Recruiter\OfferController;
use App\Http\Controllers\Representant\OfferController as RepresentantOfferController;
use App\Http\Controllers\User\OfferController as UserOfferController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
////////////////////////////Création des Middleware pour chaque Role//////////////////

// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::resource('k', OfferController::class);
// });

Route::middleware(['auth', 'user'])->group(function () {
    Route::resource('offers', OfferController::class);
});

// Route::middleware(['auth', 'recruiter'])->group(function () {
//     Route::resource('offers', OfferController::class);
// });

// Route::middleware(['auth', 'representant'])->group(function () {
//     Route::resource('jobs', OfferController::class);
// });



require __DIR__.'/auth.php';

// Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'App\Http\Controllers\User', 'middleware' => ['auth']], function () {
//     Route::get('/', 'HomeController@index')->name('home');

//     Route::resource('', 'UserController');

// });
