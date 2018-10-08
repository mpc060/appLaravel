<?php

Route::get('/', function () {
    return view('index');
});

Route::get('/usuarios', 'ControladorUsuario@indexView')->middleware('auth');
Route::get('/grupos', 'ControladorGrupo@index')->middleware('auth');
Route::get('/grupos/novo', 'ControladorGrupo@create');
Route::post('/grupos', 'ControladorGrupo@store');
Route::get('/grupos/apagar/{id}', 'ControladorGrupo@destroy');
Route::get('/grupos/editar/{id}', 'ControladorGrupo@edit');
Route::post('/grupos/{id}', 'ControladorGrupo@update');
Route::get('/sorteio', 'ControladorSorteio@index');
Route::get('/sorteiousuario', 'ControladorSorteioUsuario@index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
