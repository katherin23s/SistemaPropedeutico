<?php

namespace App\Http\Controllers;

use App\Clase;
use App\Http\Requests\ActualizarClaseRequest;
use App\Http\Requests\ClaseRequest;
use App\Http\Resources\ClaseResource;
use Illuminate\Http\Request;

class ClaseController extends Controller
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

        if (is_null($request->materia)) {
            $materia = 0;
        } else {
            $materia = $request->materia;
        }

        if ($grupo > 0 && $materia > 0) {
            $clases = Clase::with('grupo.carrera', 'grupo.semestre', 'docente')
                ->whereLike(['numero'], $busqueda)
                ->where([['grupo_id', $grupo], ['materia_id', $materia]])
                ->paginate($cantidad)
            ;
        } elseif ($grupo > 0 && $materia <= 0) {
            $clases = Clase::with('grupo.carrera', 'grupo.semestre', 'docente')
                ->whereLike(['numero'], $busqueda)
                ->where('grupo_id', $grupo)
                ->paginate($cantidad)
            ;
        } elseif ($grupo <= 0 && $materia > 0) {
            $clases = Clase::with('grupo.carrera', 'grupo.semestre', 'docente')
                ->whereLike(['numero'], $busqueda)
                ->where('materia_id', $materia)
                ->paginate($cantidad)
            ;
        } else {
            $clases = Clase::with('grupo.carrera', 'grupo.semestre', 'docente')->paginate($cantidad);
        }

        return view('Admin.Clases.index', compact('clases', 'cantidad', 'busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ClaseRequest $request)
    {
        $datosvalidados = $request->validated();
        Clase::create($datosvalidados);
        $clases = Clase::with('grupo.carrera', 'grupo.semestre', 'docente')->paginate(15);

        return ClaseResource::collection($clases);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Clase $clase)
    {
        $clase->load('materia', 'docente', 'grupo.alumnos');

        return view('Admin.Clases.ver', compact('clase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Clase $clase)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarClaseRequest $request)
    {
        $datos_validados = $request->validated();
        $id = $request->clase_id;
        $clase = Clase::findOrFail($id);

        $clase->fill($datos_validados);
        $clase->save();

        $clases = Clase::with('grupo.carrera', 'grupo.semestre', 'docente')->paginate(15);

        return ClaseResource::collection($clases);
    }

    public function encontrar(Request $request)
    {
        $clase = Clase::findOrFail($request->clase_id);

        return new ClaseResource($clase);
    }

    public function eliminar(Request $request)
    {
        $clase = Clase::findOrFail($request->clase_id);

        $clase->delete();

        $clases = Clase::with('grupo.carrera', 'grupo.semestre', 'docente')->paginate(15);

        return ClaseResource::collection($clases);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clase $clase)
    {
    }
}
