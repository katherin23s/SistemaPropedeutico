<?php

namespace App\Http\Controllers;

use App\Clase;
use App\Grupo;
use App\Http\Requests\ActualizarGrupoRequest;
use App\Http\Requests\GrupoRequest;
use App\Http\Resources\GrupoResource;
use Illuminate\Http\Request;

class GrupoController extends Controller
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

        if (is_null($request->carrera)) {
            $carrera = 0;
        } else {
            $carrera = $request->carrera;
        }

        if (is_null($request->semestre)) {
            $semestre = 0;
        } else {
            $semestre = $request->semestre;
        }
        if ($carrera > 0 && $semestre > 0) {
            $grupos = Grupo::with('carrera', 'semestre')
                ->whereLike(['numero'], $busqueda)
                ->where([['carrera_id', $carrera], ['semestre_id', $semestre]])
                ->orderBy('created_at', 'desc')
                ->paginate($cantidad)
            ;
        } elseif ($carrera > 0 && $semestre <= 0) {
            $grupos = Grupo::with('carrera', 'semestre')
                ->whereLike(['numero'], $busqueda)
                ->where('carrera_id', $carrera)
                ->orderBy('created_at', 'desc')
                ->paginate($cantidad)
            ;
        } elseif ($carrera <= 0 && $semestre > 0) {
            $grupos = Grupo::with('carrera', 'semestre')
                ->whereLike(['numero'], $busqueda)
                ->where('semestre_id', $semestre)
                ->orderBy('created_at', 'desc')
                ->paginate($cantidad)
            ;
        } else {
            $grupos = Grupo::with('carrera', 'semestre')
                ->whereLike(['numero'], $busqueda)
                ->orderBy('created_at', 'desc')
                ->paginate($cantidad)
            ;
        }

        return view('Admin.Grupos.index', compact('grupos', 'cantidad', 'busqueda'));
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
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(GrupoRequest $request)
    {
        $datosvalidados = $request->validated();
        Grupo::create($datosvalidados);

        return GrupoResource::collection(Grupo::with('carrera', 'semestre')
            ->orderBy('created_at', 'desc')
            ->paginate(15));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Grupo $grupo)
    {
        $grupo->load('semestre', 'carrera');

        $clases = Clase::with('materia', 'docente')
            ->where('grupo_id', $grupo->id)
            ->get()
        ;

        return view('Admin.Grupos.ver', compact('grupo', 'clases'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Grupo $grupo)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarGrupoRequest $request)
    {
        $datos_validados = $request->validated();
        $id = $request->grupo_id;
        $grupo = Grupo::findOrFail($id);

        $grupo->fill($datos_validados);
        $grupo->save();

        return GrupoResource::collection(Grupo::with('carrera', 'semestre')
            ->orderBy('created_at', 'desc')
            ->paginate(15));
    }

    public function encontrar(Request $request)
    {
        $grupo = Grupo::findOrFail($request->grupo_id);

        return new GrupoResource($grupo);
    }

    public function eliminar(Request $request)
    {
        $grupo = Grupo::findOrFail($request->grupo_id);

        $grupo->delete();

        return GrupoResource::collection(Grupo::with('carrera', 'semestre')
            ->orderBy('created_at', 'desc')
            ->paginate(15));
    }

    public function busqueda(Request $request)
    {
        $search = $request->search;
        $grupos = Grupo::query()
            ->whereLike(['numero'], $search)
            ->get()->take(4);
        $response = [];
        foreach ($grupos as $grupo) {
            $response[] = [
                'id' => $grupo->id,
                'text' => $grupo->numero,
            ];
        }
        echo json_encode($response);
        exit;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grupo $grupo)
    {
    }
}
