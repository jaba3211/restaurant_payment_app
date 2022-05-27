<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DishesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RestaurantsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use \App\Http\Controllers\SessionsController;
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

Route::get('/', [PageController::class,'index'])->name('index');
Route::get('/about_us', [PageController::class,'static'])->name('about_us');
Route::get('/register', [RegisterController::class,'index'])->name('registration');
Route::get('/authorization', [AuthController::class,'index'])->name('authorization');
Route::post('/register', [RegisterController::class,'create'])->name('register');
Route::post('/authorization', [SessionsController::class,'create'])->name('log_in');
Route::get('logout', [SessionsController::class,'logout'])->name('log_out');

/* restaurants */
Route::get('/restaurant/list', [RestaurantsController::class,'index'])->name('restaurants')->middleware('auth');
Route::get('/restaurant/add', [RestaurantsController::class,'add'])->name('restaurants.add')->middleware('auth');
Route::get('/restaurant/edit/{restaurant_id}', [RestaurantsController::class,'edit'])->name('restaurants.edit')->middleware('auth');
Route::post('/restaurant/create', [RestaurantsController::class,'create'])->name('restaurants.create')->middleware('auth');
Route::get('/restaurant/delete', [RestaurantsController::class,'delete'])->name('restaurants.delete')->middleware('auth');
Route::post('/restaurant/update', [RestaurantsController::class,'update'])->name('restaurants.update')->middleware('auth');
/* categories */
Route::get('/category/list', [CategoriesController::class,'index'])->name('categories')->middleware('auth');
Route::get('/category/add', [CategoriesController::class,'add'])->name('categories.add')->middleware('auth');
Route::get('/category/edit/{category_id}', [CategoriesController::class,'edit'])->name('categories.edit')->middleware('auth');
Route::post('/category/create', [CategoriesController::class,'create'])->name('categories.create')->middleware('auth');
Route::get('/category/delete', [CategoriesController::class,'delete'])->name('categories.delete')->middleware('auth');
Route::post('/category/update', [CategoriesController::class,'update'])->name('categories.update')->middleware('auth');
Route::get ('/categories', [CategoriesController::class,'front'])->name('categories.front')->middleware('auth');
/* dishes */
Route::get('/dish/list/{restaurant_id}', [DishesController::class,'index'])->name('dishes')->middleware('auth');
Route::get('/dish/add/{restaurant_id}', [DishesController::class,'add'])->name('dishes.add')->middleware('auth');
Route::post('/dish/create/{restaurant_id}', [DishesController::class,'create'])->name('dishes.create')->middleware('auth');
Route::get('/dish/delete', [DishesController::class,'delete'])->name('dishes.delete')->middleware('auth');
Route::post('/dish/update/{restaurant_id}', [DishesController::class,'update'])->name('dishes.update')->middleware('auth');


