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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');


//speaking routes
Route::get('/speaking', 'HomeController@speaking')->name('speaking')->middleware('verified');
Route::get('/shortanswer', 'HomeController@shortanswer')->name('shortanswer')->middleware('verified');
Route::get('/desimage', 'HomeController@describeImage')->name('desimage')->middleware('verified');



//listening route
Route::get('/lmcsa', 'HomeController@multipleChoiceSingleAnswer')->name('lmcsa')->middleware('verified');//multiple choice single answer
Route::get('/wfd', 'HomeController@writeFromDictation')->name('wfd')->middleware('verified');//write from dictation



//progress route
Route::get('/progress/{head}/{url}', 'HomeController@progress')->name('progress')->middleware('verified');





Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

Route::get('login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);


Route::group(['prefix' => 'admin/','middleware' => ['auth','admin']], function () {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/userlist', 'AdminController@users')->name('admin.user');
    Route::get('/premiumuser', 'AdminController@premiumusers')->name('admin.premiumuser');
});



//test routes

Route::group(['middleware' => ['auth']], function () {
    Route::post('/speaking', 'TestController@speakingDataAdd')->name('test.speaking');
    Route::post('/listening', 'TestController@listeningDataAdd')->name('test.listening');
});
