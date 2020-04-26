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
    public function index()
    {
        //el index donde se muestra la lista de todos los clases
        $clases = Clase::with('grupo.carrera', 'materia', 'docente')
            ->paginate(15)
        ;

        return view('Admin.Clases.index', compact('clases'));
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

    public function buscar(Request $request)
    {
        if (is_null($request['buscar'])) {
            $busqueda = '';
        } else {
            $busqueda = $request['buscar'];
        }

        $grupo_id = $request['grupo'];
        $materia_id = $request['materia'];
        if ($grupo_id > 0 && $materia_id > 0) {
            $clases = Clase::with('grupo.carrera', 'grupo.semestre', 'docente')
                ->whereLike(['numero'], $busqueda)
                ->where([['grupo_id', $grupo_id], ['materia_id', $materia_id]])
                ->paginate(15)
            ;
        } elseif ($grupo_id > 0 && $materia_id <= 0) {
            $clases = Clase::with('grupo.carrera', 'grupo.semestre', 'docente')
                ->whereLike(['numero'], $busqueda)
                ->where('grupo_id', $grupo_id)
                ->paginate(15)
            ;
        } elseif ($grupo_id <= 0 && $materia_id > 0) {
            $clases = Clase::with('grupo.carrera', 'grupo.semestre', 'docente')
                ->whereLike(['numero'], $busqueda)
                ->where('materia_id', $materia_id)
                ->paginate(15)
            ;
        } else {
            $clases = Clase::with('grupo.carrera', 'grupo.semestre', 'docente')->paginate(15);
        }

        return view('Admin.Clases.index', compact('clases'));
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
