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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/tweets/tweet_json','TweetsController@tweet_json');//tweetjsonファイルを出力
Route::get('/tweets/tweet_json/{id}','TweetsController@tweet_json');
Route::post('/tweets/tweet_post_json','TweetsController@tweet_post_json');//tweetjsonファイルを出力
Route::post('/tweets/profile_update','TweetsController@profile_update');//tweetjsonファイルを出力
Route::get('/tweets/User_json','TweetsController@User_json');//Userjsonファイルを出力
Route::get('/tweets/User_json/{id}','TweetsController@User_json');
Route::get('/tweets/favorite_json','TweetsController@favorite_json');//favoritejsonファイルを出力
Route::get('/tweets/favorite_json/{id}','TweetsController@favorite_json');
Route::get('/tweets/follow_json','TweetsController@follow_json');//Userjsonファイルを出力
Route::get('/tweets/follow_json/{id}','TweetsController@follow_json');
Route::get('/tweets/profile_json','TweetsController@profile_json');//Userjsonファイルを出力
Route::get('/tweets/profile_json/{id}','TweetsController@profile_json');
Route::get('/tweets/login_user','TweetsController@login_user');//login情報
Route::get('/tweets/login_id','TweetsController@login_id');//login_id情報
Route::get('/tweets/logout','TweetsController@logout');//Logout
//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'],function(){
//  Route::resource('users', 'UsersController', ['only' => ['index','show','edit','update']]);

Route::get('/{any}', function() {
    return view('users.index');
})->where('any', '.*');
});
