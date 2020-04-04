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

Auth::routes();

/**
 * 
 * Home Page route
 * 
 */
Route::get('/home', 'HomeController@index')->name('home');

/**
 * 
 * Single User Profile related route
 * 
 */

Route::get('/user-profile/{user_id}', 'ProfilesController@index')->name('profile.show');
Route::get('/user-profile/{user_id}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/user-profile/{user_id}', 'ProfilesController@update')->name('profile.update');

/**
 * 
 * Blog Post related route
 * 
 */

Route::get('/post/create', 'PostsController@create')->name('post.create');
Route::post('/post', 'PostsController@store')->name('post.store');
Route::get('/post/{post_id}', 'PostsController@show')->name('post.show');
Route::delete('/post/{post_id}', 'PostsController@destroy')->name('post.destroy');

Auth::routes();
