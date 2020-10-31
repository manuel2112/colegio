<?php

Route::view('/','home')->name('home');

//COLEGIO
Route::get('/colegio','ColegioController@index')->name('colegio.index');
Route::get('/colegio/crear','ColegioController@create')->name('colegio.create');
Route::post('/colegio','ColegioController@store')->name('colegio.store');
Route::get('/colegio/{colegio}/editar','ColegioController@edit')->name('colegio.edit');
Route::patch('/colegio/{colegio}','ColegioController@update')->name('colegio.update');
Route::delete('/colegio/{colegio}','ColegioController@destroy')->name('colegio.destroy');

//ALUMNOS
Route::get('/alumnos','AlumnoController@index')->name('alumnos.index');
Route::get('/alumno/crear','AlumnoController@create')->name('alumnos.create');
Route::post('/alumnos','AlumnoController@store')->name('alumnos.store');
Route::get('/alumnos/{alumno}/show','AlumnoController@show')->name('alumnos.show');
Route::get('/alumnos/{alumno}/editar','AlumnoController@edit')->name('alumnos.edit');
Route::patch('/alumnos/{alumno}','AlumnoController@update')->name('alumnos.update');
Route::delete('/alumnos/{alumno}','AlumnoController@destroy')->name('alumnos.destroy');

//CIUDAD
Route::get('/ciudad','CiudadController@index')->name('ciudad.index');
Route::get('/ciudad/crear','CiudadController@create')->name('ciudad.create');
Route::post('/ciudad','CiudadController@store')->name('ciudad.store');
Route::get('/ciudad/{ciudad}/editar','CiudadController@edit')->name('ciudad.edit');
Route::patch('/ciudad/{ciudad}','CiudadController@update')->name('ciudad.update');
Route::delete('/ciudad/{ciudad}','CiudadController@destroy')->name('ciudad.destroy');

//PREVISIÓN
Route::get('/prevision','PrevisionController@index')->name('prevision.index');
Route::get('/prevision/crear','PrevisionController@create')->name('prevision.create');
Route::post('/prevision','PrevisionController@store')->name('prevision.store');
Route::get('/prevision/{prevision}/editar','PrevisionController@edit')->name('prevision.edit');
Route::patch('/prevision/{prevision}','PrevisionController@update')->name('prevision.update');
Route::delete('/prevision/{prevision}','PrevisionController@destroy')->name('prevision.destroy');

//TIPO DE SANGRE
Route::get('/tiposangre','TipoSangreController@index')->name('tiposangre.index');
Route::get('/tiposangre/crear','TipoSangreController@create')->name('tiposangre.create');
Route::post('/tiposangre','TipoSangreController@store')->name('tiposangre.store');
Route::get('/tiposangre/{tiposangre}/editar','TipoSangreController@edit')->name('tiposangre.edit');
Route::patch('/tiposangre/{tiposangre}','TipoSangreController@update')->name('tiposangre.update');
Route::delete('/tiposangre/{tiposangre}','TipoSangreController@destroy')->name('tiposangre.destroy');

//TIPO DE SANGRE
Route::get('/tipoapoderado','TipoApoderadoController@index')->name('tipoapoderado.index');
Route::get('/tipoapoderado/crear','TipoApoderadoController@create')->name('tipoapoderado.create');
Route::post('/tipoapoderado','TipoApoderadoController@store')->name('tipoapoderado.store');
Route::get('/tipoapoderado/{tipoapoderado}/editar','TipoApoderadoController@edit')->name('tipoapoderado.edit');
Route::patch('/tipoapoderado/{tipoapoderado}','TipoApoderadoController@update')->name('tipoapoderado.update');
Route::delete('/tipoapoderado/{tipoapoderado}','TipoApoderadoController@destroy')->name('tipoapoderado.destroy');

//APODERADOS
Route::get('/apoderado','ApoderadoController@index')->name('apoderado.index');
Route::get('/apoderado/crear','ApoderadoController@create')->name('apoderado.create');
Route::post('/apoderado','ApoderadoController@store')->name('apoderado.store');
Route::get('/apoderado/{apoderado}/show','ApoderadoController@show')->name('apoderado.show');
Route::get('/apoderado/{apoderado}/editar','ApoderadoController@edit')->name('apoderado.edit');
Route::patch('/apoderado/{apoderado}','ApoderadoController@update')->name('apoderado.update');
Route::delete('/apoderado/{apoderado}','ApoderadoController@destroy')->name('apoderado.destroy');