<?php

use Illuminate\Http\Request;

Route::get('/tasks', 'TaskController@index');
Route::post('/tasks', 'TaskController@store');
Route::get('/tasks/{task}', 'TaskController@show');
Route::put('/tasks/{task}', 'TaskController@update');
Route::delete('/tasks/{task}', 'TaskController@destroy');
