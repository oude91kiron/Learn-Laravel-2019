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


    /**
     * S30/V195: Creating a post from admin page.   
     * 1. Create a middleware route and use the group function to create
     * all the routes that need the user to be authorized.
     * 2. Create a Route to send user from admin page to the create page.
    */
Route::middleware('auth')->group(function() {

    Route::get('/admin', 'AdminsController@index')->name('admin.index');
    
    Route::get('/admin/posts', 'PostController@index')->name('post.index');
    Route::get('/admin/posts/create', 'PostController@create')->name('post.create');
    Route::post('/admin/posts', 'PostController@store')->name('post.store');
    
    Route::get('/admin/posts/{post}/edit', 'PostController@edit')->name('post.edit');
    Route::DELETE('/admin/posts/{post}/destroy', 'PostController@destroy')->name('post.destroy');
    Route::patch('/admin/posts/{post}/update', 'PostController@update')->name('post.update');
 
    Route::get('admin/users/{user}/profile', 'UserController@show')->name('user.profile.show');
    Route::PUT('admin/users/{user}/update', 'UserController@update')->name('user.profile.update');

    Route::get('admin/users', 'UserController@index')->name('users.index');
    Route::DELETE('admin/users/{user}/destroy', 'UserController@destroy')->name('user.destroy');

});

// By passing a policy rule ->middleware('can:view,post') to the middleware method we can keep 
// the view page and the post methods save from a user that not authorizde.
// Route::get('/admin/posts/{post}/edit', 'PostController@edit')->middleware('can:view,post')->name('post.edit');


