<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ventureformController;
use App\Http\Controllers\Auth\VentureController;
use App\Http\Controllers\guestregisterController;
use App\Http\Controllers\ListingController;


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
//Route::get('/', [ActivityController::class, 'userindex'])->name('activity.userindex') ;

//Route::get('/activity', [ActivityController::class, 'index'])->name('activity.index');
//Route::get('/activity/create', [ActivityController::class, 'create'])->name('activity.create');
//Route::post('event/', [ActivityController::class, 'event'])->name('activity.event');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',[HomeController::class,"index"])->name('dashboard');

Route::get('/redirects',[HomeController::class,"index"]);
Route::post('/guestregister',[guestregisterController::class,"index"]);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/userdashboard', [ActivityController::class, 'userDashboard'])->name('activity.userdashboard');
Route::get('/admindashboard', [ActivityController::class, 'adminDashboard'])->name('activity.admindashboard');

Route::get('/home',[ActivityController::class, 'userindex'])->name('activity.userindex');
Route::get('/adminindex',[ActivityController::class, 'adminindex'])->name('activity.adminindex');
Route::get('/event/create', [ActivityController::class, 'create'])->name('activity.create');
Route::post('event/', [ActivityController::class, 'event'])->name('activity.event');
Route::get('/activities/{id}/edit', 'ActivityController@edit')->name('activities.edit');
Route::get('/activity', [ActivityController::class, 'index'])->name('activity.index');
Route::patch('/activity/{activity}/approve', [ActivityController::class, 'approveRequest'])->name('activity.approve');
Route::delete('/activity/{activity}/deny', [ActivityController::class, 'denyRequest'])->name('activity.deny');
// Admin Routes
//Route::prefix('admin')->group(function () {
    //Route::get('/dashboard', [ActivityController::class, 'adminDashboard'])->name('admin.dashboard');
    //Route::patch('/activity/{activity}/approve', [ActivityController::class, 'approveRequest'])->name('activity.approve');
    //Route::delete('/activity/{activity}/deny', [ActivityController::class, 'denyRequest'])->name('activity.deny');
//});
//Route::get('edit/{activity}', [ActivityController::class,'edit'])->name('edit');
//Route::put('edit/{activity}',[ActivityController::class,'update'])->name('update');
Route::delete('/activity/{activity}',[ActivityController::class, 'destroy'])->name('activity.delete'); 
Route::get('/delete_activity/{id}', [ActivityController::class, 'delete_activity'])->name('delete_activity');
//Route::get('edit/{id}', [ActivityController::class, 'edit_activity']);
//Route::delete('/activity/{activity}/destroy', [ActivityController::class, 'destroy'])->name('activity.destroy');


Route::get('/activity/show/{activity}', [ActivityController::class,'show'])->name('activity.show');
// View More Details
//Route::get('/activity/{activity}/details', [ActivityController::class, 'showDetails'])->name('activity.details');

// Search Activities
Route::get('/activity.search', [ActivityController::class, 'searchActivities'])->name('activity.search');
Route::get('/searc-udb', [ActivityController::class, 'searchUserDB'])->name('activity.searchUDB');

Route::get('/redirect-to-link/{link}', [ActivityController::class, 'redirectToLink'])->name('redirect.to.link');
//Route::get('activity/redirect/{link}', [ActivityController::class, 'redirectToLink2'])->name('activity.redirectToLink2');

Route::get('/map', function () {
    return view('map.map');
});

Route::get('/search', [ListingController::class, 'search'])->name('map.search');

require __DIR__.'/auth.php';