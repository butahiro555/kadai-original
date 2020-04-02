<?php

// countの中身がNULLの場合は、Laravel 5.5 + PHP 7.2だとWarningが出るので、それを出ないように設定するためのコード
if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}

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

// 未ログインユーザーのページ
Route::get('/', 'TemplatesController@index');

//  ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

//  ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

// ユーザー機能(テンプレートの作成、および編集機能)
Route::group(['middleware' => ['auth']], function () {
    Route::get('templates', 'TemplatesController@show')->name('templates.show');
    Route::post('templates_store', 'TemplatesController@store')->name('templates.store');
    Route::put('templates_update/{id}', 'TemplatesController@update')->name('templates.update');
    Route::delete('templates_destroy/{id}', 'TemplatesController@destroy')->name('templates.destroy');
    
    //検索機能追加
    Route::get('search', 'TemplatesController@search')->name('search');
});

// ユーザーページ
Route::group(['middleware' => ['auth']], function () {
    Route::get('profile', 'UsersController@index')->name('users.index');
    
    Route::get('name', 'UsersController@name_edit')->name('users.name_edit');
    Route::patch('name_update', 'UsersController@name_update')->name('users.name_update');
    
    Route::get('mail', 'UsersController@mail_edit')->name('users.mail_edit');
    Route::patch('mail_update', 'UsersController@mail_update')->name('users.mail_update');
    
    Route::get('password/current', 'UsersController@password_current')->name('users.password_current');
    Route::post('/password/new', 'UsersController@password_new')->name('users.password_new');
    Route::patch('/password_update', 'UsersController@password_update')->name('users.password_update');
    
    Route::delete('destroy', 'UsersController@destroy')->name('users.destroy');
});