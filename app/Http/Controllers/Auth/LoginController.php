<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\IniciarSesionRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:docente')->except('logout');
        $this->middleware('guest:alumno')->except('logout');
    }

    public function inicioSesionDocente()
    {
        return view('auth.login', ['url' => 'docente']);
    }

    public function docenteLogin(IniciarSesionRequest $request)
    {
        $validados = $request->validate();

        if (Auth::guard('docente')->attempt(['email' => $validados->email, 'password' => $validados->password], $request->get('remember'))) {
            return redirect()->intended('/docente');
        }

        return back()->withInput($request->only('email', 'remember'));
    }

    public function inicioSesionAlumno()
    {
        return view('auth.login', ['url' => 'alumno']);
    }

    public function alumnoLogin(IniciarSesionRequest $request)
    {
        $validados = $request->validate();

        if (Auth::guard('alumno')->attempt(['email' => $validados->email, 'password' => $validados->password], $request->get('remember'))) {
            return redirect()->intended('/alumno');
        }

        return back()->withInput($request->only('email', 'remember'));
    }
}
