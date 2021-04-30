<?php

use Illuminate\Support\Facades\Route;

    Route::get('/permissions', 'permissionController@index')->name('permissions.index');

    Route::post('/permissions', 'permissionController@store')->name('permissions.store');

    Route::DELETE('/permissions/{permission}/destroy', 'permissionController@destroy')->name('permissions.destroy');

    Route::get('/permissions/{permission}/edit', 'permissionController@edit')->name('permissions.edit');

    Route::put('/permissions/{permission}/update', 'permissionController@update')->name('permissions.update');

    Route::put('/permissions/{permission}/attach', 'permissionController@attach_permissions')->name('permissions.permissions.attach');

    Route::put('/permissions/{permission}/detach', 'permissionController@detach_permissions')->name('permissions.permissions.detach');

?>