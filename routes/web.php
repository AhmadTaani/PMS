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

Route::group(['middleware'=>['auth','admin'],'namespace'=>'Admin','prefix' => 'admin/'], function() {
    Route::resource('category', 'AdminCategoryController',['as' => 'admin']);
    Route::resource('product', 'AdminProductController',['as' => 'admin']);
    Route::resource('user', 'AdminUserController',['as' => 'admin']);
    Route::resource('dashboard', 'AdminDashboardController',['as' => 'admin']);
});
Route::group(['middleware'=>['auth','user'],'namespace'=>'User'], function() {
    Route::resource('product', 'ProductController');
    Route::resource('user', 'UserController');
    Route::resource('dashboard', 'DashboardController');
});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('admin/register', 'Admin\AdminUserController@regForm')->name('admin.register');
Route::post('admin/register', 'Admin\AdminUserController@createAdmin')->name('admin.store');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
