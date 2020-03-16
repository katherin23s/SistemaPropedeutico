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

//Route::resource('/dashboard', 'AdminController@admin')->name('Dashboard');

Route::get('/dashboard', 'AdminController@admin')->name('Dashboard');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::resource('alumnos', 'AlumnoController');
    Route::resource('docentes', 'DocenteController');

    Route::resource('inscripcionAlumnos', 'AlumnosController');
    Route::resource('inscripcionDocentes', 'DocenteController');

    Route::get('/plantel', 'UserController@plantel')->name('Plantel');
    Route::get('/materia', 'UserController@materia')->name('Materia');
    Route::get('/grupo', 'UserController@grupo')->name('Grupo');
    Route::get('/gestionAlumnos', 'UserController@gestionAlumnos')->name('GestionAlumnos');
    Route::get('/gestionDocentes', 'UserController@gestionDocentes')->name('GestionDocentes');
    Route::get('/dashboardDocentes', 'UserController@dashboardDocentes')->name('SidebarDocente');
    Route::get('/informacionPerfilAlumno', 'UserController@InformacionPerfilAlumno')->name('InformacionPerfilAlumno');
    Route::get('/informacionPerfilDocente', 'UserController@InformacionPerfilDocente')->name('InformacionPerfilDocente');
    Route::get('/configuracionAlumno', 'UserController@configuracionAlumno')->name('ConfiguracionAlumno');
    Route::get('/configuracionDocente', 'UserController@configuracionDocente')->name('ConfiguracionDocente');
    Route::get('/kardex_Alumno', 'UserController@kardexAlumno')->name('Kardex_Alumno');
    Route::get('/horarioAlumno', 'UserController@horarioAlumno')->name('HorarioAlumno');
    Route::get('/horarioDocente', 'UserController@horarioDocente')->name('HorarioDocente');
    Route::get('/DocumentosAlumnos', 'UserController@documentosAlumnos')->name('DocumentosAlumnos');
    Route::get('/DocumentosDocentes', 'UserController@documentosDocente')->name('DocumentosDocentes');
    Route::get('/gruposDocente', 'UserController@gruposDocente')->name('GruposDocente');
    // Route::get('/Carreras', 'UserController@carreras')->name('Carreras');

    Route::get('planteles', 'PlantelController@index')->name('planteles.index');
    Route::post('planteles/agregar', 'PlantelController@store')->name('planteles.store');
    Route::post('planteles/encontrar', 'PlantelController@encontrar')->name('planteles.encontrar');
    Route::patch('planteles/actualizar', 'PlantelController@update')->name('planteles.update');
    Route::post('planteles/departamentos', 'PlantelController@obtenerDepartamentos')->name('planteles.departamentos');
    Route::delete('planteles/eliminar', 'PlantelController@eliminar')->name('planteles.eliminar');

    Route::get('departamentos', 'DepartamentoController@index')->name('departamentos.index');
    Route::post('departamentos/agregar', 'DepartamentoController@store')->name('departamentos.store');
    Route::post('departamentos/encontrar', 'DepartamentoController@encontrar')->name('departamento.encontrar');
    Route::post('departamentos/busqueda', 'DepartamentoController@busqueda')->name('departamentos.busqueda');
    Route::patch('departamentos/actualizar', 'DepartamentoController@update')->name('departamentos.update');
    Route::delete('departamentos/eliminar', 'DepartamentoController@eliminar')->name('departamentos.eliminar');

    Route::get('carreras', 'CarreraController@index')->name('carreras.index');
    Route::post('carreras/agregar', 'CarreraController@store')->name('carreras.store');
    Route::post('carreras/encontrar', 'CarreraController@encontrar')->name('carreras.encontrar');
    Route::patch('carreras/actualizar', 'CarreraController@update')->name('carreras.update');
    Route::delete('carreras/eliminar', 'CarreraController@eliminar')->name('carreras.eliminar');
    Route::post('carreras/busqueda', 'CarreraController@busqueda')->name('carreras.busqueda');

    Route::get('semestres', 'SemestreController@index')->name('semestres.index');
    Route::post('semestres/agregar', 'SemestreController@store')->name('semestres.store');
    Route::post('semestres/encontrar', 'SemestreController@encontrar')->name('semestres.encontrar');
    Route::patch('semestres/actualizar', 'SemestreController@update')->name('semestres.update');
    Route::delete('semestres/eliminar', 'SemestreController@eliminar')->name('semestres.eliminar');
    Route::post('semestres/busqueda', 'SemestreController@busqueda')->name('semestres.busqueda');

    Route::get('grupos', 'GrupoController@index')->name('grupos.index');
    Route::post('grupos/agregar', 'GrupoController@store')->name('grupos.store');
    Route::post('grupos/encontrar', 'GrupoController@encontrar')->name('grupos.encontrar');
    Route::patch('grupos/actualizar', 'GrupoController@update')->name('grupos.update');
    Route::delete('grupos/eliminar', 'GrupoController@eliminar')->name('grupos.eliminar');

    Route::get('materias', 'MateriaController@index')->name('materias.index');
    Route::post('materias/agregar', 'MateriaController@store')->name('materias.store');
    Route::post('materias/encontrar', 'MateriaController@encontrar')->name('materias.encontrar');
    Route::patch('materias/actualizar', 'MateriaController@update')->name('materias.update');
    Route::delete('materias/eliminar', 'MateriaController@eliminar')->name('materias.eliminar');
    Route::post('materias/busqueda', 'MateriaController@busqueda')->name('materias.busqueda');

    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});
