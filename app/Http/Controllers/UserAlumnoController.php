<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserAlumnoController extends Controller
{
    /**
     * Show the form for editing the specified user.
     *
     * @return \Illuminate\View\View
     */
    public function edit(Alumno $user)
    {
        if (1 == $user->id) {
            return redirect()->route('user.index');
        }

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, Alumno $user)
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

    public function home(Alumno $alumno)
    {
        return view('Alumnos.home', compact('alumno'));
    }

    public function horario(Alumno $alumno)
    {
        $alumno->load('grupo.clases');

        return view('Alumnos.horario', compact('alumno'));
    }
}
