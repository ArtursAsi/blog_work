<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'PostController@index');

Auth::routes();


Route::get('/home', 'UserController@index')->name('home');

Route::get('/home/{user}/password', 'UserController@password')->name('user.password');
Route::patch('/home/{user}/password', 'UserController@updatePassword')->name('user.updatePassword');
Route::get('/home/{user}/email', 'UserController@email')->name('user.email');
Route::patch('/home/{user}/email', 'UserController@updateEmail')->name('user.updateEmail');

Route::get('/home/post', 'PostController@create')->name('posts.create');
Route::post('/home/post', 'PostController@store')->name('posts.store');
Route::get('/home/post/{post}/show', 'PostController@show')->name('posts.show');
Route::get('/home/post/{post}/edit', 'PostController@edit')->name('posts.edit');
Route::patch('/home/post/{post}', 'PostController@update')->name('posts.update');
Route::patch('/home/post/{post}/picture', 'PostController@updatePicture')->name('posts.updatePicture');
Route::delete('/home/post/{post}/picture', 'PostController@destroy')->name('posts.destroy');
Route::delete('/home/{post}', 'PostController@deletePicture')->name('posts.deletePicture');


Route::get('/posts/{post}', 'PostController@target')->name('posts.target');
