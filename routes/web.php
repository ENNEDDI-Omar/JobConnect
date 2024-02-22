<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
////////////////////////////Création des Middleware pour chaque Role//////////////////

Route::middleware('admin')->group(function () {
    
});

Route::middleware('user')->group(function () {
    
});

Route::middleware('recruiter')->group(function () {
    
});

Route::middleware('representant')->group(function () {
    
});


require __DIR__.'/auth.php';

// Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'App\Http\Controllers\User', 'middleware' => ['auth']], function () {
//     Route::get('/', 'HomeController@index')->name('home');

//     Route::resource('', 'UserController');

// });
