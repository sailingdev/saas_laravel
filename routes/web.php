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
    Route::get('/post','PublishAllController@index');
    Route::get('/facebook_post','FacebookPostController@index');
    Route::get('/instagram_post','InstagramPostController@index');
    Route::get('/twitter_post','TwitterPostController@index');
    Route::get('/schedules','SchedulesController@index');
    Route::get('/account_manager','AccountManagerController@index');
    Route::get('/file_manager','FileManagerController@index');
    Route::get('/group_manager','GroupManagerController@index');
    Route::get('/caption','CaptionController@index');
    Route::get('/watermark','WatermarkController@index');
    Route::get('/user_manager','UserManagerController@index');
    Route::get('/user_manager/index','UserManagerController@index');
    Route::get('/user_manager/report','UserManagerController@report');
    Route::post('/user_manager/report','UserManagerController@post_report');
    Route::get('/platforms','PlatformsController@index');
    Route::get('/analytics','AnalyticsController@index');

});



