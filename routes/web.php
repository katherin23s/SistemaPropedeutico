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
	//Route::resource('departamento', 'UserController@departamento', ['except' => ['show']]);
	Route::resource('planteles', 'PlantelController');
//	Route::resource('informacionAlumno', 'AlumnosController');

	Route::get('/departamento', 'UserController@departamento')->name('Departamento');
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
	
	
	
	

	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

