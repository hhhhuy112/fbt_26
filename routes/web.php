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

Route::get('/admin', function () {
    return view('admin.layout.app');
});

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
Route::post('/tour/search', 'TourController@search')->name('tour.search');
Route::post('/tour/{id}/rate', 'TourController@rate')->name('tour.rate');
Route::get('/review/{id}/like', 'LikeController@like')->name('like');
Route::get('/review/{id}/dislike', 'LikeController@dislike')->name('dislike');
Route::post('/tour/{id}/review', 'TourController@review')->name('tour.review');
Route::get('/latest', 'TourController@showLatestTours')->name('tour.latest');
Route::get('/best', 'TourController@showBestTours')->name('tour.best');
Route::get('/popular', 'TourController@showPopularTours')->name('tour.popular');
Route::post('/search', 'TourController@search')->name('tour.search');

Route::resource('tour.booking', 'TourBookingController')->only('store');
Route::resource('booking', 'BookingController')->except('store', 'show');
Route::resource('review', 'ReviewController');
