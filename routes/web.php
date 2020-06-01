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

// Route::get('/dashboard', 'AdminController@admin')->name('Dashboard');

Route::view('/', 'welcome');

Auth::routes();

Route::get('/login/docente', 'Auth\LoginController@inicioSesionDocente');
Route::get('/login/alumno', 'Auth\LoginController@inicioSesionAlumno');

Route::post('/login/docente', 'Auth\LoginController@docenteLogin')->name('login.docente');
Route::post('/login/alumno', 'Auth\LoginController@alumnoLogin')->name('login.alumno');

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

//Alumno
Route::group(['middleware' => ['auth.alumno']], function () {
    // login protected routes.
    Route::get('/alumno/{alumno}/inicio', 'UserAlumnoController@home')->name('alumno.home');
    Route::get('/alumno/{alumno}/horario', 'UserAlumnoController@horario')->name('alumno.horario');
    Route::get('/alumno/{alumno}/kardex', 'UserAlumnoController@kardex')->name('alumno.kardex');
    Route::get('/alumno/{alumno}/documentos', 'UserAlumnoController@documentos')->name('alumno.documentos');
    Route::patch('alumno/documento/cargar', 'DocumentoController@update')->name('documento.cargar');
    Route::post('documento/encontrar', 'DocumentoController@encontrar')->name('documento.encontrar');
});

//DOCENTE
Route::group(['middleware' => ['auth.docente']], function () {
    // login protected routes.
    Route::get('/docente/{docente}/inicio', 'UserDocenteController@home')->name('docente.home');
    Route::get('/docente/{docente}/horario', 'UserDocenteController@horario')->name('docente.horario');
    Route::get('/docente/{docente}/evidencias', 'UserDocenteController@evidencias')->name('docente.evidencias');
    Route::get('/docente/{docente}/clase/{clase}', 'UserDocenteController@clase')->name('docente.clase.ver');
    Route::patch('docente/calificacion/actualizar', 'CalificacionUnidadController@actualizarValor')->name('calificacion.actualizar');
});

//ADMIN
Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'UserController', ['except' => ['show']]);

    Route::resource('inscripcionAlumnos', 'AlumnosController');
    // Route::resource('inscripcionDocentes', 'DocenteController');

    Route::get('/plantel', 'UserController@plantel')->name('Plantel');
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
    //Route::post('planteles/buscar', 'PlantelController@buscar')->name('planteles.buscar');
    Route::patch('planteles/actualizar', 'PlantelController@update')->name('planteles.update');
    Route::post('planteles/departamentos', 'PlantelController@obtenerDepartamentos')->name('planteles.departamentos');

    Route::delete('planteles/eliminar', 'PlantelController@eliminar')->name('planteles.eliminar');

    Route::get('departamentos', 'DepartamentoController@index')->name('departamentos.index');
    Route::post('departamentos/agregar', 'DepartamentoController@store')->name('departamentos.store');
    Route::post('departamentos/encontrar', 'DepartamentoController@encontrar')->name('departamento.encontrar');
    Route::post('departamentos/busqueda', 'DepartamentoController@busqueda')->name('departamentos.busqueda');
    Route::patch('departamentos/actualizar', 'DepartamentoController@update')->name('departamentos.update');
    Route::delete('departamentos/eliminar', 'DepartamentoController@eliminar')->name('departamentos.eliminar');
    Route::post('departamentos/buscar', 'DepartamentoController@buscar')->name('departamentos.buscar');
    Route::get('departamentos/{departamento}', 'DepartamentoController@show')->name('departamentos.ver');

    Route::get('carreras', 'CarreraController@index')->name('carreras.index');
    Route::post('carreras/agregar', 'CarreraController@store')->name('carreras.store');
    Route::post('carreras/encontrar', 'CarreraController@encontrar')->name('carreras.encontrar');
    Route::patch('carreras/actualizar', 'CarreraController@update')->name('carreras.update');
    Route::delete('carreras/eliminar', 'CarreraController@eliminar')->name('carreras.eliminar');
    Route::post('carreras/busqueda', 'CarreraController@busqueda')->name('carreras.busqueda');
    Route::post('carreras/buscar', 'CarreraController@buscar')->name('carreras.buscar');
    Route::post('carreras/materias', 'CarreraController@obtenerMaterias')->name('carreras.materias');
    Route::get('carreras/{carrera}', 'CarreraController@show')->name('carreras.ver');

    Route::get('semestres', 'SemestreController@index')->name('semestres.index');
    Route::post('semestres/agregar', 'SemestreController@store')->name('semestres.store');
    Route::post('semestres/encontrar', 'SemestreController@encontrar')->name('semestres.encontrar');
    Route::patch('semestres/actualizar', 'SemestreController@update')->name('semestres.update');
    Route::delete('semestres/eliminar', 'SemestreController@eliminar')->name('semestres.eliminar');
    Route::post('semestres/busqueda', 'SemestreController@busqueda')->name('semestres.busqueda');
    Route::post('semestres/buscar', 'SemestreController@buscar')->name('semestres.buscar');
    Route::get('semestres/{semestre}', 'SemestreController@show')->name('semestres.ver');

    Route::get('grupos', 'GrupoController@index')->name('grupos.index');
    Route::post('grupos/agregar', 'GrupoController@store')->name('grupos.store');
    Route::post('grupos/encontrar', 'GrupoController@encontrar')->name('grupos.encontrar');
    Route::patch('grupos/actualizar', 'GrupoController@update')->name('grupos.update');
    Route::delete('grupos/eliminar', 'GrupoController@eliminar')->name('grupos.eliminar');
    Route::post('grupos/busqueda', 'GrupoController@busqueda')->name('grupos.busqueda');
    Route::get('grupos/{grupo}', 'GrupoController@show')->name('grupos.ver');
    Route::post('grupos/buscar', 'GrupoController@buscar')->name('grupos.buscar');

    Route::get('materias', 'MateriaController@index')->name('materias.index');
    Route::post('materias/agregar', 'MateriaController@store')->name('materias.store');
    Route::post('materias/encontrar', 'MateriaController@encontrar')->name('materias.encontrar');
    Route::patch('materias/actualizar', 'MateriaController@update')->name('materias.update');
    Route::delete('materias/eliminar', 'MateriaController@eliminar')->name('materias.eliminar');
    Route::post('materias/busqueda', 'MateriaController@busqueda')->name('materias.busqueda');
    Route::post('materias/buscar', 'MateriaController@buscar')->name('materias.buscar');
    Route::get('materias/{materia}', 'MateriaController@show')->name('materias.ver');

    Route::get('clases', 'ClaseController@index')->name('clases.index');
    Route::post('clases/agregar', 'ClaseController@store')->name('clases.store');
    Route::post('clases/encontrar', 'ClaseController@encontrar')->name('clases.encontrar');
    Route::patch('clases/actualizar', 'ClaseController@update')->name('clases.update');
    Route::delete('clases/eliminar', 'ClaseController@eliminar')->name('clases.eliminar');
    Route::post('clases/busqueda', 'ClaseController@busqueda')->name('clases.busqueda');
    Route::post('clases/buscar', 'ClaseController@buscar')->name('clases.buscar');
    Route::get('clases/{clase}', 'ClaseController@show')->name('clases.ver');

    Route::post('docentes/agregar', 'DocenteController@store')->name('registrar.docente');
    Route::post('alumnos/agregar', 'AlumnoController@store')->name('registrar.alumno');

    Route::get('docentes', 'DocenteController@index')->name('docentes.index');
    Route::post('docentes/encontrar', 'DocenteController@encontrar')->name('docentes.encontrar');
    Route::patch('docentes/actualizar', 'DocenteController@update')->name('docentes.update');
    Route::get('docentes/{docente}/actualizar', 'DocenteController@edit')->name('docentes.actualizar');
    Route::delete('docentes/eliminar', 'DocenteController@eliminar')->name('docentes.eliminar');
    Route::post('docentes/busqueda', 'DocenteController@busqueda')->name('docentes.busqueda');
    Route::post('docentes/buscar', 'DocenteController@buscar')->name('docentes.buscar');
    Route::get('docentes/{docente}', 'DocenteController@show')->name('docentes.ver');

    Route::get('alumnos', 'AlumnoController@index')->name('alumnos.index');
    Route::post('alumnos/encontrar', 'AlumnoController@encontrar')->name('alumnos.encontrar');
    Route::get('alumnos/{alumno}/actualizar', 'AlumnoController@edit')->name('alumnos.actualizar');
    Route::patch('alumnos/{alumno}/actualizar', 'AlumnoController@update')->name('alumnos.update');
    Route::delete('alumnos/eliminar', 'AlumnoController@eliminar')->name('alumnos.eliminar');
    Route::post('alumnos/buscar', 'AlumnoController@buscar')->name('alumnos.buscar');
    Route::get('alumnos/{alumno}', 'AlumnoController@show')->name('alumnos.ver');

    Route::get('documentos', 'DocumentoController@index')->name('documentos.index');
    Route::post('documentos/agregar', 'DocumentoController@store')->name('documentos.store');
    Route::post('documentos/encontrar', 'DocumentoController@encontrar')->name('documentos.encontrar');
    Route::patch('documentos/actualizar', 'DocumentoController@update')->name('documentos.update');
    Route::patch('documentos/revisar', 'DocumentoController@revisar')->name('documentos.revisar');
    Route::delete('documentos/eliminar', 'DocumentoController@eliminar')->name('documentos.eliminar');
    Route::get('documentos/alumno', 'DocumentoController@documentosAlumno')->name('documentos.alumno');

    Route::get('materiales', 'MaterialController@index')->name('materiales.index');
    Route::post('materiales/agregar', 'MaterialController@store')->name('materiales.store');
    Route::post('materiales/encontrar', 'MaterialController@encontrar')->name('materiales.encontrar');
    Route::patch('materiales/actualizar', 'MaterialController@update')->name('materiales.update');
    Route::patch('materiales/revisar', 'MaterialController@revisar')->name('materiales.revisar');
    Route::delete('materiales/eliminar', 'MaterialController@eliminar')->name('materiales.eliminar');
    Route::get('materiales/alumno', 'MaterialController@materialesClase')->name('materiales.clase');

    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});
