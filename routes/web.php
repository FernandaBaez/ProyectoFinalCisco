<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['guest']], function () {
  Route::get('/', 'Auth\LoginController@showLoginForm');
  Route::post('/login', 'Auth\LoginController@login')->name('login');
});

Route::group(['middleware' => ['auth']], function () {

  Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

  Route::get('/main', function () {
      return view('contenido/contenido');
  })->name('main');

  Route::group(['middleware' => ['Contacto']], function(){
    //Rutas de instructores
    Route::get('/instructor', 'InstructorController@index');
    Route::post('/instructor/registrar', 'InstructorController@store');
    Route::put('/instructor/actualizar', 'InstructorController@update');
    Route::put('/instructor/desactivar', 'InstructorController@desactivar');
    Route::put('/instructor/activar', 'InstructorController@activar');
    Route::get('/instructor/selectInstructor', 'InstructorController@selectInstructor');

  });

  //Route::group(['middleware' => ['Administrador']], function(){
    //Rutas de instructores
    Route::get('/instructor', 'InstructorController@index');
    Route::post('/instructor/registrar', 'InstructorController@store');
    Route::put('/instructor/actualizar', 'InstructorController@update');
    Route::put('/instructor/desactivar', 'InstructorController@desactivar');
    Route::put('/instructor/activar', 'InstructorController@activar');
    Route::get('/instructor/selectInstructor', 'InstructorController@selectInstructor');

    //Rutas de cursos
    Route::get('/cursos', 'CursoController@index');
    Route::post('/cursos/registrar', 'CursoController@store');
    Route::put('/cursos/actualizar', 'CursoController@update');
    Route::put('/cursos/desactivar', 'CursoController@desactivar');
    Route::put('/cursos/activar', 'CursoController@activar');
    Route::get('/cursos/selectCurso', 'CursoController@selectCurso');

    //Rutas de grupos
    Route::get('/grupos', 'GrupoController@index');
    Route::post('/grupos/registrar', 'GrupoController@store');
    Route::put('/grupos/actualizar', 'GrupoController@update');
    Route::put('/grupos/desactivar', 'GrupoController@desactivar');
    Route::put('/grupos/activar', 'GrupoController@activar');

    //Rutas de academias
    Route::get('/academia', 'AcademiaController@index');
    Route::post('/academia/registrar', 'AcademiaController@store');
    Route::put('/academia/actualizar', 'AcademiaController@update');
    Route::put('/academia/desactivar', 'AcademiaController@desactivar');
    Route::put('/academia/activar', 'AcademiaController@activar');
    Route::get('/academia/selectAcademia', 'AcademiaController@selectAcademia');

    //Rutas de usuarios
    Route::get('/usuario', 'UsuarioController@index');
    Route::post('/usuario/registrar', 'UsuarioController@store');
    Route::put('/usuario/actualizar', 'UsuarioController@update');
    Route::put('/usuario/desactivar', 'UsuarioController@desactivar');
    Route::put('/usuario/activar', 'UsuarioController@activar');
    Route::get('/usuario/selectUsuario', 'UsuarioController@selectUsuario');

    //Rutas de contactos
    Route::get('/contacto', 'ContactoController@index');
    Route::post('/contacto/registrar', 'ContactoController@store');
    Route::put('/contacto/actualizar', 'ContactoController@update');
    Route::put('/contacto/desactivar', 'ContactoController@desactivar');
    Route::put('/contacto/activar', 'ContactoController@activar');
    Route::get('/contacto/selectContacto', 'ContactoController@selectContacto');

    //Rutas de curso_instructores
    Route::get('/inscripcion', 'InscripcionController@index');
    Route::post('/inscripcion/registrar', 'InscripcionController@store');
    Route::put('/inscripcion/actualizar', 'InscripcionController@update');
    Route::put('/inscripcion/desactivar', 'InscripcionController@desactivar');
    Route::put('/inscripcion/activar', 'InscripcionController@activar');

  
//});

});

//Route::get('/home', 'HomeController@index')->name('home');
