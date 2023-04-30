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


$controller_path = 'App\Http\Controllers';


Route::get('/', function () {
    return redirect()->route('auth.create');
});
Route::resource('auth', $controller_path . '\authentications\AuthController')->except([
    'index', 'show', 'update'
]);

Route::get('/checkout', $controller_path . '\pages\CheckoutController@index')->middleware('auth')->name('pages-checkout');

Route::resource('user', $controller_path . '\authentications\UserController')->except([
    'index', 'show'
]);
