<?php 

use Illuminate\Support\Facades\Route;

Route::get('/posts/create', 'PostController@create')->name('post.create');

Route::post('/posts', 'PostController@store')->name('post.store');

Route::get('/posts/{post}/edit', 'PostController@edit')->name('post.edit');

Route::DELETE('/posts/{post}/destroy', 'PostController@destroy')->name('post.destroy');

Route::patch('/posts/{post}/update', 'PostController@update')->name('post.update');
 
?>