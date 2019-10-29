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

// Route::get('/', function () {
//     return view('welcome');
// });

 Auth::routes();

 
Route::get('/','IndexController@index');
Route::get('/detail/{id}','IndexController@detail');
Route::get('/listing/','IndexController@listing');
Route::get('/data','IndexController@data');
Route::get('/card/{id}','IndexController@card');
Route::get('/contact','IndexController@contact');
Route::post('/query','IndexController@query');
Route::post('/filter','IndexController@filter');

//admin routes
Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/home', 'AdminController@index')->name('admin.home');
    Route::post('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/pending','AdminController@pending');
    Route::get('/check/{id}','AdminController@check');
    Route::get('/approve/{id}','AdminController@approve');
    Route::get('/reject/{id}','AdminController@reject');
    Route::get('/approved','AdminController@approved');
    Route::get('/rejected','AdminController@rejected');
   
});
//user routes
Route::prefix('user')->group(function(){
    Route::get('/home', 'HomeController@home')->name('user.home');
    Route::get('/register','HomeController@register');
    Route::post('/register','HomeController@store');
    Route::patch('/edit','HomeController@update');
    Route::get('/index','HomeController@index');
    Route::get('/query','HomeController@query');
    Route::get('/reply/{id}','HomeController@replyform');
    Route::post('/reply','HomeController@reply');
});
Route::get('/redirect','GoogleAuthController@redirect');
Route::get('/callback','GoogleAuthController@callback');

