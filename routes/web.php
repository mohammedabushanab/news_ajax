<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticalController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CagtegoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\UserAuthController;
use App\Models\Artical;
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

Route::prefix('cms/')->middleware('guest:admin')->group(function () {
    route::get('{guard}/login', [UserAuthController::class, 'showLogin'])->name('view.login');
    route::post('{guard}/login', [UserAuthController::class, 'login']);

});

Route::prefix('cms/admin')->middleware('auth:admin')->group(function(){
    Route::get('/logout' , [UserAuthController::class , 'logout'])->name('view.logout');
});

Route::prefix('cms/admin/')->middleware('auth:admin')->group(function () {

    Route::view('','cms.parent');
    Route::resource('countries', CountryController::class );
    Route::post('countries_update/{id}',[CountryController::class ,'update'])->name('countries_update');


    Route::resource('cities', CityController::class);
    Route::post('cities_update/{id}',[CityController::class ,'update'])->name('cities_update');

    Route::resource('admins',AdminController::class);
    Route::post('admins_update/{id}',[AdminController::class ,'update'])->name('admins_update');


    Route::resource('authors',AuthorController::class);
    Route::post('authors_update/{id}',[AuthorController::class ,'update'])->name('authors_update');

    Route::resource('categories',CagtegoryController::class);

    Route::post('categories_update/{id}',[CagtegoryController::class, 'update'])->name('categories_update');

    Route::resource('articals',ArticalController::class);

    Route::post('articals_update/{id}',[ArticalController::class, 'update'])->name('articals_update');

    Route::get('/create/articals/{id}',[ArticalController::class, 'createArtical'])->name('createArtical');
    Route::get('/index/articals/{id}',[ArticalController::class, 'indexArtical'])->name('indexArtical');

});