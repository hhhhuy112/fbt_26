<?php

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

use Illuminate\Http\Request;
use App\Models\Tour;

Route::resource('tour.booking', 'TourBookingController')->only('store');

Route::resources([
    'user' => 'UserController',
    'tour' => 'TourController',
]);

Route::get('/', 'TourController@index')->name('home');


Route::get('/login/{social}', 'Auth\LoginController@redirectToProvider')->name('social-login');

Route::get('/login/{social}/callback', 'Auth\LoginController@handleProviderCallback');

Auth::routes();
