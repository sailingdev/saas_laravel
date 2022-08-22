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

Auth::routes();

Route::get('/', "WimaxController@index");
Route::get('/pricing', 'WimaxController@pricing');
Route::get('/blog/{id?}', 'WimaxController@blog');
Route::get('/create-post', 'PostController@create');
Route::post('/submit-post','PostController@store');

Route::get('out', function (){
    Auth::logout();
});

Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');


Route::middleware(['auth'])->group(function () {
    Route::get('/home','HomeController@index');
    Route::get('/dashboard','DashboardController@index');


});



