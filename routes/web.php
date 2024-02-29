<?php



use App\Http\Controllers\Admin\DashController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
// Route::get('home',[HomeController::class,'index']);
// Route::get('community',[HomeController::class,'displayCommunity']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
////////////////////////////CrÃ©ation des Middleware pour chaque Role//////////////////

// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::resource('k', OfferController::class);
// });



// Route::middleware(['auth', 'recruiter'])->group(function () {
//     Route::resource('offers', OfferController::class);
// });

// Route::middleware(['auth', 'representant'])->group(function () {
//     Route::resource('jobs', OfferController::class);
// });



require __DIR__.'/auth.php';

Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('profil/{id}', [UserController::class, 'show'])->name('profil')->middleware('auth');
Route::get('community', [HomeController::class, 'displayCommunity'])->middleware('auth');


 Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'App\Http\Controllers\User', 'middleware' => ['auth', 'user']], function () {
    Route::resource('user', 'UserController');
    Route::resource('experiences','ExperienceController');
    Route::resource('educations','EducationController');
    Route::resource('offers','OfferController');
    Route::resource('applications', 'ApplicationController');

});




Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::resource('dashboard', 'DashAdminController');
    Route::resource('dash', 'DashController'); 

    //Route::resource('dashboard', 'DashController'); 
    Route::get('stastics', [DashController::class,'allStatistics']); 

    Route::resource('company', 'CompanyController'); 

});



Route::group(['prefix' => 'recruiter', 'as' => 'recruiter.', 'namespace' => 'App\Http\Controllers\Recruiter', 'middleware' => ['auth', 'recruiter']], function () {
    
    Route::resource('dashboard','DashRecruiterController');
    Route::resource('offers','OfferController');
   
    

});

Route::group(['prefix' => 'representant', 'as' => 'representant.', 'namespace' => 'App\Http\Controllers\Representant', 'middleware' => ['auth', 'representant']], function () {
    Route::resource('','DashRepresentantController');
    Route::resource('offers','OfferController');
    Route::resource('company', 'CompanyController');
    Route::resource('applications', 'ApplicationController');
    Route::put('/applications/{application}', 'ApplicationController@updateStatus')->name('applications.updateStatus');
    Route::delete('/applications/{application}', 'ApplicationController@destroy')->name('applications.destroy');
    Route::get('/applications/{application}', 'ApplicationController@showApplicationUser')->name('applications.show');
    Route::get('/users/{id}', 'UserController@show')->name('users.show');

    //Route::get('/offers/search', 'OfferController@search')->name('offers.search');

});

Route::get('companiesUpdate', ['Admin\CompanyController@updateUser']); 

Route::get('/offers/search', [HomeController::class,'search'])->name('offers.search');





