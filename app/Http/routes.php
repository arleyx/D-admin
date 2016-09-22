<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'DonorsController@index');

Route::get('/register', ['uses' => function () {
    return view('donation.register');
}, 'as' => 'register']);


/*
 * ABOUT BEERING AND DONATIONS
 */
Route::get('/about-beering', ['uses' => function () {
    return view('about.beering');
}, 'as' => 'about-beering']);

Route::get('/about-donation', ['uses' => function () {
    return view('about.donation');
}, 'as' => 'about-donation']);



Route::get('/login', ['uses' => function () {
    return view('login');
}, 'as' => 'sign-in']);

Route::get('/donate', ['uses' => function ($confirm) {
    dd($confirm);
}, 'as' => 'donate']);


Route::resource('donor', 'DonorsController');

/*
|--------------------------------------------------------------------------
| Application Routes - ADMIN
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('admin/login', 'Auth\AuthController@getLogin');
Route::post('admin/login', ['uses' => 'Auth\AuthController@postLogin', 'as' => 'admin.login']);
Route::get('admin/logout', ['uses' => 'Auth\AuthController@getLogout', 'as' => 'admin.logout']);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('', function () {
        return redirect('admin/login');
    });

    //Route::get('dashboard', ['uses' => 'AdminController@postLogin', 'as' => 'admin.login']);

    Route::get('dashboard', ['uses' => function () {
        return view('admin.dashboard');
    }, 'as' => 'admin.dashboard']);

});
