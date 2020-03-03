<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    public function departamento(User $model)
    {
        return view('users.Departamento', ['users' => $model->paginate(15)]);
    }

    public function plantel(User $model)
    {
        return view('users.Plantel', ['users' => $model->paginate(15)]);
    }

    public function materia(User $model)
    {
        return view('users.Materia', ['users' => $model->paginate(15)]);
    }

    public function grupo(User $model)
    {
        return view('users.Grupo', ['users' => $model->paginate(15)]);
    }

    public function gestionAlumnos(User $model)
    {
        return view('users.GestionAlumnos', ['users' => $model->paginate(15)]);
    }

    public function gestionDocentes(User $model)
    {
        return view('users.GestionDocentes', ['users' => $model->paginate(15)]);
    }

    public function dashboardDocentes(User $model)
    {
        return view('users.SidebarDocente', ['users' => $model->paginate(15)]);
    }

    public function informacionPerfilAlumno(User $model)
    {
        return view('users.InformacionPerfilAlumno', ['users' => $model->paginate(15)]);
    }

    public function informacionPerfilDocente(User $model)
    {
        return view('users.InformacionPerfilDocente', ['users' => $model->paginate(15)]);
    }

    public function configuracionAlumno(User $model)
    {
        return view('users.ConfiguracionAlumno', ['users' => $model->paginate(15)]);
    }

    public function configuracionDocente(User $model)
    {
        return view('users.ConfiguracionDocente', ['users' => $model->paginate(15)]);
    }

    public function kardexAlumno(User $model)
    {
        return view('users.Kardex_Alumno', ['users' => $model->paginate(15)]);
    }

    public function horarioAlumno(User $model)
    {
        return view('users.HorarioAlumno', ['users' => $model->paginate(15)]);
    }

    public function horarioDocente(User $model)
    {
        return view('users.HorarioDocente', ['users' => $model->paginate(15)]);
    }

    public function documentosAlumnos(User $model)
    {
        return view('users.DocumentosAlumnos', ['users' => $model->paginate(15)]);
    }

    public function documentosDocente(User $model)
    {
        return view('users.DocumentosDocentes', ['users' => $model->paginate(15)]);
    }

    public function gruposDocente(User $model)
    {
        return view('users.GruposDocente', ['users' => $model->paginate(15)]);
    }

    public function carreras(User $model)
    {
        return view('users.Carreras', ['users' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request, User $model)
    {
        $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());

        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        if ($user->id == 1) {
            return redirect()->route('user.index');
        }

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        $hasPassword = $request->get('password');
        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except(
                    [$hasPassword ? '' : 'password']
                )
        );

        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        if ($user->id == 1) {
            return abort(403);
        }

        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }
}
