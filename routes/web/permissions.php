<?php

use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function() {

    Route::get('/permissions', 'PermissionController@index')->name('permissions.index');

});

?>