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

Route::resources([
    'user' => 'UserController',
    'tour' => 'TourController',
]);

Route::get('/', 'TourController@index')->name('home');


Route::get('/login/{social}', 'Auth\LoginController@redirectToProvider')->name('social-login');

Route::get('/login/{social}/callback', 'Auth\LoginController@handleProviderCallback');

Auth::routes();

Route::post('booking/{id}/cancel', 'BookingController@cancel')->name('booking.cancel');
Route::get('/cancel', 'BookingController@canceledList')->name('booking.cancelList');
Route::post('/booking/{id}/restore', 'BookingController@restore')->name('booking.restore');

Route::resource('tour.booking', 'TourBookingController')->only('store');
Route::resource('booking', 'BookingController')->except('store', 'show');
