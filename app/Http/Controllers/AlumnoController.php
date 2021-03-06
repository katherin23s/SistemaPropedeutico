<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\Http\Requests\ActualizarAlumnoRequest;
use App\Http\Requests\RegistrarAlumnoRequest;
use App\Http\Resources\AlumnoResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (is_null($request->cantidad)) {
            $cantidad = 10;
        } else {
            $cantidad = $request->cantidad;
        }

        if (is_null($request->busqueda)) {
            $busqueda = '';
        } else {
            $busqueda = $request->busqueda;
        }

        if (is_null($request->grupo)) {
            $grupo = 0;
        } else {
            $grupo = $request->grupo;
        }

        if ($grupo > 0) {
            $alumnos = Alumno::with('grupo')
                ->whereLike(['nombre', 'numero_alumno', 'email'], $busqueda)
                ->where('grupo_id', $grupo)
                ->orderBy('created_at', 'desc')
                ->paginate($cantidad)
            ;
        } else {
            $alumnos = Alumno::with('grupo')
                ->whereLike(['nombre', 'numero_alumno', 'email'], $busqueda)
                ->orderBy('created_at', 'desc')
                ->paginate($cantidad)
            ;
        }

        return view('Admin.Alumnos.index', compact('alumnos', 'cantidad', 'busqueda'));
    }

    public function store(RegistrarAlumnoRequest $request)
    {
        $validados = $request->validated();
        $validados['password'] = Hash::make($validados['password']);
        Alumno::create($validados);

        $alumnos = Alumno::with('grupo')->orderBy('created_at', 'desc')->paginate(15);

        return AlumnoResource::collection($alumnos);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        $alumno->load('grupo.clases.docente', 'grupo.clases.materia', 'calificaciones.clase.materia');

        return view('Admin.Alumnos.ver', compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        return view('Admin.Alumnos.editar', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarAlumnoRequest $request, Alumno $alumno)
    {
        $datos_validados = $request->validated();

        $alumno->fill($datos_validados);
        $alumno->save();

        return redirect()->route('alumnos.actualizar', compact('alumno'))
            ->withStatus(__('Datos de alumno actualizados correctamente.'))
        ;
    }

    public function encontrar(Request $request)
    {
        $alumno = Alumno::findOrFail($request->alumno_id);

        return new AlumnoResource($alumno);
    }

    public function eliminar(Request $request)
    {
        $alumno = Alumno::findOrFail($request->alumno_id);

        $alumno->delete();

        $alumnos = Alumno::with('grupo')->paginate(15);

        return AlumnoResource::collection($alumnos);
    }

    public function buscar(Request $request)
    {
        if (is_null($request['buscar'])) {
            $busqueda = '';
        } else {
            $busqueda = $request['buscar'];
        }

        $grupo_id = $request['grupo'];
        if ($grupo_id > 0) {
            $alumnos = Alumno::with('grupo')
                ->whereLike(['nombre', 'numero_alumno', 'email'], $busqueda)
                ->where('grupo_id', $grupo_id)
                ->orderBy('created_at', 'desc')
                ->paginate(15)
            ;
        } else {
            $alumnos = Alumno::with('grupo')
                ->whereLike(['nombre', 'numero_alumno', 'email'], $busqueda)
                ->orderBy('created_at', 'desc')
                ->paginate(15)
            ;
        }

        return view('Admin.Alumnos.index', compact('alumnos'));
    }
}
