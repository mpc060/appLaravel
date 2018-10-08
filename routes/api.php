<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/grupos', 'controladorGrupo@indexJson');
Route::resource('/usuarios', 'ControladorUsuario');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');