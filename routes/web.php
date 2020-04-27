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
Route::post('/tweets/create_user','UsersController@userCreate');//ユーザ登録
Route::post('/tweets/create_user/{data}','UsersController@userCreate');//ユーザ登録
Auth::routes();
Route::get('/tweets/tweet_json','TweetsController@tweetJson');//tweetjsonファイルを出力
Route::get('/tweets/tweet_json/{id}','TweetsController@tweetJson');
Route::post('/tweets/tweet_post_json','TweetsController@tweetPostJson');//tweetjsonファイルを出力
Route::post('/tweets/tweet_post_json/{a}/{b}','TweetsController@tweetPostJson');//tweetjsonファイルを出力
Route::get('/tweets/tweet_only_user','TweetsController@tweetGetOnlyLoginUser');
Route::post('/tweets/profile_update','TweetsController@profileUpdate');//tweetjsonファイルを出力
Route::get('/tweets/User_json','UsersController@UserJson');//Userjsonファイルを出力
Route::get('/tweets/User_json/{id}','UsersController@UserJson');
Route::get('/tweets/favorite_json','TweetsController@favoriteJson');//favoritejsonファイルを出力
Route::get('/tweets/favorite_json/{id}','TweetsController@favoriteJson');
Route::get('/tweets/follow_json','TweetsController@follow_json');//Userjsonファイルを出力
Route::get('/tweets/follow_json/{id}','TweetsController@follow_json');
Route::get('/tweets/profile_json','TweetsController@profileJson');//Userjsonファイルを出力
Route::get('/tweets/profile_json/{id}','TweetsController@profileJson');
Route::get('/tweets/login_user','UsersController@loginUser');//login情報
Route::get('/tweets/login_id','UsersController@loginId');//login_id情報
Route::get('/tweets/logout','UsersController@logout');//Logout

//Route::get('/duplication','UsersController@Duplication');//デバック用の関数

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'],function(){
//  Route::resource('users', 'UsersController', ['only' => ['index','show','edit','update']]);

Route::get('/{any}', function() {
    return view('users.index');
})->where('any', '.*');
});
