<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FounditemController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/', 'PagesController@index');

// Route::get('/', [PagesController::class, 'index']);
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){

    Route::get('/dashboard', 'App\Http\Controllers\AdminController@index')->name('admin.dashboard');
    Route::get('/lostitems', 'App\Http\Controllers\AdminController@lostitems')->name('admin.lostitems');
    Route::get('/founditems', 'App\Http\Controllers\AdminController@founditems')->name('admin.founditems');
    Route::get('/users', 'App\Http\Controllers\AdminController@users')->name('admin.users');
    Route::get('/founditems/{founditem}', 'App\Http\Controllers\AdminController@ShowFounditem')->name('admin.showfounditem');
    Route::get('/lostitems/{lostitem}', 'App\Http\Controllers\AdminController@ShowLostitem')->name('admin.showlostitem');
    Route::delete('/lostitems/{lostitem}', 'App\Http\Controllers\AdminController@deleteLostitem')->name('admin.deleteLostitem');
    Route::delete('/founditems/{founditem}', 'App\Http\Controllers\AdminController@deleteFounditem')->name('admin.deleteFounditem');
    Route::delete('/users/{user}', 'App\Http\Controllers\AdminController@deleteUser')->name('admin.deleteUser');
});

// Route::prefix('user')->group(function(){
//     Route::get('/', 'App\Http\Controllers\PagesController@index');
//     Route::resource('lost_items', 'App\Http\Controllers\LostitemController');
//     Route::resource('found_items', 'App\Http\Controllers\FounditemController');
//     Route::get('/change_status/{id}', [FounditemController::class, 'changeStatus']);
// });

    Route::post('password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::get('/', 'App\Http\Controllers\PagesController@index');
    Route::get('/myposts', 'App\Http\Controllers\PagesController@myPosts')->name('pages.myposts');
    Route::resource('lost_items', 'App\Http\Controllers\LostitemController');
    Route::resource('found_items', 'App\Http\Controllers\FounditemController');
    Route::get('/change_status/{id}', [FounditemController::class, 'changeStatus']);
    Route::get('/change_status/{id}', 'App\Http\Controllers\LostitemController@changeStatus');
    // Route::get('/change_status/{id}', [LostitemController::class, 'changeStatus']);

