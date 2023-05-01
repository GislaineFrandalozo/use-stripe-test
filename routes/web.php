<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;

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


$controller_path = 'App\Http\Controllers';


Route::get('/', function () {
    return redirect()->route('auth.create');
})->middleware('guest');

Route::get('/auth/login', $controller_path . '\authentications\AuthController@create')->middleware('guest')->name('auth.create');
Route::post('/auth', $controller_path . '\authentications\AuthController@store')->middleware('guest')->name('auth.store');
Route::post('/auth/logout', $controller_path . '\authentications\AuthController@destroy' )->middleware('auth')->name('auth.destroy');

Route::get('/checkout', $controller_path . '\pages\CheckoutController@index')->middleware('auth')->name('pages-checkout');
Route::post('/checkout', $controller_path . '\pages\CheckoutController@store')->middleware('auth')->name('checkout.store');

Route::resource('user', $controller_path . '\authentications\UserController')->except([
    'index', 'show', 'edit', 'destroy'
]);

Route::get('/profile', $controller_path . '\authentications\UserController@edit')->middleware('auth')->name('user.edit');