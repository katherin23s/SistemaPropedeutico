<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\Http\Requests\ActualizarAlumnoRequest;
use App\Http\Resources\AlumnoResource;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::with('grupo')->paginate(10);

        return view('Admin.Alumnos.index', compact('alumnos'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarAlumnoRequest $request)
    {
        $datos_validados = $request->validated();
        $id = $request->alumno_id;
        $alumno = Alumno::findOrFail($id);

        $alumno->fill($datos_validados);
        $alumno->save();

        $alumnos = Alumno::with('grupo')->paginate(10);

        return AlumnoResource::collection($alumnos);
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

        $alumnos = Alumno::with('grupo')->paginate(10);

        return AlumnoResource::collection($alumnos);
    }
}
