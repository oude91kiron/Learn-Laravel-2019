<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/post/{post}', 'PostController@show')->name('post');

Route::get('/posts', 'PostController@index')->name('post.index');


Route::middleware('auth')->group(function() {
    Route::get('/admin', 'AdminsController@index')->name('admin.index');
});

// By passing a policy rule ->middleware('can:view,post') to the middleware method we can keep 
// the view page and the post methods save from a user that not authorizde.
// Route::get('/admin/posts/{post}/edit', 'PostController@edit')->middleware('can:view,post')->name('post.edit');


