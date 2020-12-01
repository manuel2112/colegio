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
Route::get('/alumnos/json','AlumnoController@json')->name('alumnos.json');

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
Route::post('/apoderado/{apoderado}/pupilo','ApoderadoController@addpupilo')->name('apoderado.addalumno');
Route::delete('/apoderado/{apoderado}/pupilo','ApoderadoController@destroypupilo')->name('apoderado.destroypupilo');
Route::get('/apoderado/json','ApoderadoController@json')->name('apoderado.json');

//TIPO DE CARGO
Route::get('/tipocargo','TipoCargoController@index')->name('tipocargo.index');
Route::get('/tipocargo/crear','TipoCargoController@create')->name('tipocargo.create');
Route::post('/tipocargo','TipoCargoController@store')->name('tipocargo.store');
Route::get('/tipocargo/{tipocargo}/editar','TipoCargoController@edit')->name('tipocargo.edit');
Route::patch('/tipocargo/{tipocargo}','TipoCargoController@update')->name('tipocargo.update');
Route::delete('/tipocargo/{tipocargo}','TipoCargoController@destroy')->name('tipocargo.destroy');

//FUNCIONARIOS
Route::get('/funcionario','FuncionarioController@index')->name('funcionario.index');
Route::get('/funcionario/crear','FuncionarioController@create')->name('funcionario.create');
Route::post('/funcionario','FuncionarioController@store')->name('funcionario.store');
Route::get('/funcionario/{funcionario}/show','FuncionarioController@show')->name('funcionario.show');
Route::get('/funcionario/{funcionario}/editar','FuncionarioController@edit')->name('funcionario.edit');
Route::patch('/funcionario/{funcionario}','FuncionarioController@update')->name('funcionario.update');
Route::delete('/funcionario/{funcionario}','FuncionarioController@destroy')->name('funcionario.destroy');
Route::get('/funcionario/json','FuncionarioController@json')->name('funcionario.json');

//ASIGNATURAS
Route::get('/asignatura','AsignaturaController@index')->name('asignatura.index');
Route::get('/asignatura/crear','AsignaturaController@create')->name('asignatura.create');
Route::post('/asignatura','AsignaturaController@store')->name('asignatura.store');
Route::post('/asignatura/import','AsignaturaController@import')->name('asignatura.import');
Route::get('/asignatura/{asignatura}/editar','AsignaturaController@edit')->name('asignatura.edit');
Route::patch('/asignatura/{asignatura}','AsignaturaController@update')->name('asignatura.update');
Route::delete('/asignatura/{asignatura}','AsignaturaController@destroy')->name('asignatura.destroy');
Route::get('/asignatura/json','AsignaturaController@json')->name('asignatura.json');
Route::post('/asignatura/ajaxuso','AsignaturaController@ajaxuso')->name('asignatura.ajaxuso');

//NIVEL
Route::get('/nivel','NivelController@index')->name('nivel.index');
Route::get('/nivel/crear','NivelController@create')->name('nivel.create');
Route::post('/nivel','NivelController@store')->name('nivel.store');
Route::get('/nivel/{nivel}/editar','NivelController@edit')->name('nivel.edit');
Route::patch('/nivel/{nivel}','NivelController@update')->name('nivel.update');
Route::delete('/nivel/{nivel}','NivelController@destroy')->name('nivel.destroy');

//CURSO
Route::get('/curso','CursoController@index')->name('curso.index');
Route::get('/curso/crear','CursoController@create')->name('curso.create');
Route::post('/curso','CursoController@store')->name('curso.store');
Route::get('/curso/{curso}/editar','CursoController@edit')->name('curso.edit');
Route::patch('/curso/{curso}','CursoController@update')->name('curso.update');
Route::delete('/curso/{curso}','CursoController@destroy')->name('curso.destroy');

Route::get('/cursoasignatura/{curso}','CursoController@cursoasignatura')->name('curso.cursoasignatura');
Route::post('/cursoasignatura/{curso}','CursoController@cursoasignaturainsert')->name('curso.cursoasignaturainsert');
Route::delete('/cursoasignatura/{curso}','CursoController@cursoasignaturadelete')->name('curso.cursoasignaturadelete');
Route::post('/ajaxprofesor','CursoController@ajaxaddprofesor')->name('curso.ajaxaddprofesor');