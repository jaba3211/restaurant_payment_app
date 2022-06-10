<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BucketController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DishesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RestaurantsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UsersController;
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
/* search */
Route::get('/search', [SearchController::class,'search'])->name('search');
/* pages: register, login  and log out */
Route::get('/', [PageController::class,'index'])->name('index');
Route::get('/about_us', [PageController::class,'static'])->name('about_us');
Route::get('/profile', [PageController::class,'profile'])->name('profile');
Route::get('/register', [RegisterController::class,'index'])->name('registration');
Route::get('/authorization', [AuthController::class,'index'])->name('authorization');
Route::post('/register', [RegisterController::class,'create'])->name('register');
Route::post('/authorization', [SessionsController::class,'create'])->name('log_in');
Route::get('logout', [SessionsController::class,'logout'])->name('log_out');

Route::group(['middleware' => 'auth'], function (){
    //----------------------------------------- admin -----------------------------------------------------
    /* restaurants */
    Route::get('/restaurant/list', [RestaurantsController::class,'index'])->name('restaurants')->middleware('admin');
    Route::get('/restaurant/add', [RestaurantsController::class,'add'])->name('restaurants.add')->middleware('admin');
    Route::get('/restaurant/edit/{restaurant_id}', [RestaurantsController::class,'edit'])->name('restaurants.edit')->middleware('admin');
    Route::post('/restaurant/create', [RestaurantsController::class,'create'])->name('restaurants.create')->middleware('admin');
    Route::get('/restaurant/delete', [RestaurantsController::class,'delete'])->name('restaurants.delete')->middleware('admin');
    Route::post('/restaurant/update', [RestaurantsController::class,'update'])->name('restaurants.update')->middleware('admin');
    /* categories */
    Route::get('/category/list', [CategoriesController::class,'index'])->name('categories')->middleware('admin');
    Route::get('/category/add', [CategoriesController::class,'add'])->name('categories.add')->middleware('admin');
    Route::get('/category/edit/{category_id}', [CategoriesController::class,'edit'])->name('categories.edit')->middleware('admin');
    Route::post('/category/create', [CategoriesController::class,'create'])->name('categories.create')->middleware('admin');
    Route::get('/category/delete', [CategoriesController::class,'delete'])->name('categories.delete')->middleware('admin');
    Route::post('/category/update', [CategoriesController::class,'update'])->name('categories.update')->middleware('admin');
    /* dishes */
    Route::get('/dish/list/{restaurant_id}', [DishesController::class,'index'])->name('dishes')->middleware('admin');
    Route::get('/dish/add/{restaurant_id}', [DishesController::class,'add'])->name('dishes.add')->middleware('admin');
    Route::get('/dish/edit/{restaurant_id}/{dish_id}', [DishesController::class,'edit'])->name('dishes.edit')->middleware('admin');
    Route::post('/dish/create', [DishesController::class,'create'])->name('dishes.create')->middleware('admin');
    Route::get('/dish/delete', [DishesController::class,'delete'])->name('dishes.delete')->middleware('admin');
    Route::post('/dish/update/{restaurant_id}', [DishesController::class,'update'])->name('dishes.update')->middleware('admin');
    /* staff */
    Route::get('/staff/list', [UsersController::class,'index'])->name('staff.list')->middleware('admin');
    Route::get('/staff/delete/{username}', [UsersController::class,'delete'])->name('user.delete')->middleware('admin');
    Route::get('/staff/edit/password/{username}', [UsersController::class,'editPassword'])->name('staff.edit.password')->middleware('admin');
    Route::post('/staff/update/password/{username}', [UsersController::class,'updatePassword'])->name('staff.update.password');
    /* users */
    Route::get('/users/list', [UsersController::class,'userIndex'])->name('users.list')->middleware('admin');
    Route::get('/users/edit/password/{username}', [UsersController::class,'editPassword'])->name('user.reset.password');
    Route::post('/users/update/password/{username}', [UsersController::class,'updatePassword'])->name('users.update.password');
    Route::get('/users/edit/{username}', [UsersController::class,'edit'])->name('user.edit');
    Route::get('/users/confirm/password/{username}', [UsersController::class,'confirm'])->name('user.confirm.password');
    Route::post('/users/confirm/{username}', [UsersController::class,'confirmPass'])->name('confirm.password');
    Route::post('/users/update/{username}', [RegisterController::class,'update'])->name('user.update');

//----------------------------------------- frontend -----------------------------------------------------
    /* bucket */
    Route::get ('/basket', [BucketController::class,'index'])->name('bucket');
    Route::get('/basket/add', [BucketController::class,'add'])->name('bucket.add');
    Route::post('/basket/update', [BucketController::class,'update'])->name('bucket.update');
    Route::get('/basket/remove', [BucketController::class,'remove'])->name('bucket.remove');
    Route::get('/basket/cancel', [BucketController::class,'cancel'])->name('bucket.cancel');
    /* orders */
    Route::get ('/orders', [OrdersController::class,'index'])->name('orders');
    Route::get ('/orders/{date}', [OrdersController::class,'show'])->name('orders.inside');
    Route::get ('/orders/column/create', [OrdersController::class,'create'])->name('orders.create');

//----------------------------------------- staff -----------------------------------------------------
    /* new orders */
    Route::get ('/staff/new/orders', [OrdersController::class,'staffIndex'])->name('staff.new.orders')->middleware('staff')->middleware('staff');
    Route::get ('/staff/new/orders/{table}/{date}', [OrdersController::class,'staffShow'])->name('staff.new.orders.inside')->middleware('staff');
    Route::get ('/staff/order/submit/{date}', [OrdersController::class,'submit'])->name('staff.submit.order')->middleware('staff');
    /* old orders */
    Route::get ('/staff/old/orders', [OrdersController::class,'staffOldIndex'])->name('staff.old.orders')->middleware('staff')->middleware('staff');
    Route::get ('/staff/old/orders/{table}/{date}', [OrdersController::class,'staffOldShow'])->name('staff.old.orders.inside')->middleware('staff');
});
/* QR */
Route::get ('/scan/QR', [PageController::class,'QR'])->name('scan.QR');
/* categories */
Route::get ('/categories/{table}/{restaurant_id}', [CategoriesController::class,'front'])->name('categories.front');
/* dishes */
Route::get ('/dishes/{category_id}', [DishesController::class,'front'])->name('dishes.front');
Route::get ('/dishes/{dish_id}/{name?}', [DishesController::class,'show'])->name('dishes.show');



