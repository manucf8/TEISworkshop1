<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

Route::controller(App\Http\Controllers\ObjectController::class)->group(function () {
    Route::get('/objects', 'index')->name('object.index');
    Route::get('/objects/create', 'create')->name('object.create');
    Route::get('/objects/{id}', 'show')->name('object.show');
    Route::post('/objects/store', 'store')->name('object.store');
    Route::delete('/objects/{id}/delete', 'delete')->name('object.delete');
});
