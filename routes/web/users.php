<?php

use Illuminate\Support\Facades\Route;


Route::middleware('role:Admin')->group(function()
    {
        // only the admin user can route to the page admin/users.
        Route::get('admin/users', 'UserController@index')->name('users.index');

    });


    /**
     * S30/V195: Creating a post from admin page.   
     * 1. Create a middleware route and use the group function to create
     * all the routes that need the user to be authorized.
     * 2. Create a Route to send user from admin page to the create page.
    */
    
    Route::PUT('/users/{user}/update', 'UserController@update')->name('user.profile.update');

    Route::DELETE('/users/{user}/destroy', 'UserController@destroy')->name('user.destroy');

    Route::put('/users/{user}/attach', 'UserController@attach')->name('user.role.attach');
    
    Route::put('/users/{user}/detach', 'UserController@detach')->name('user.role.detach');

    
    Route::middleware(['can:view,user'])->group(function() 
    {
        Route::get('/users/{user}/profile', 'UserController@show')->name('user.profile.show');
    });

    
?>