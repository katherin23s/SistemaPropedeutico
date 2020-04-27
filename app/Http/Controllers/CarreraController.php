<?php

namespace App\Http\Controllers;

use App\Carrera;
use App\Http\Requests\ActualizarCarreraRequest;
use App\Http\Requests\CarreraRequest;
use App\Http\Resources\CarreraResource;
use App\Materia;
use Illuminate\Http\Request;

class CarreraController extends Controller
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

        if (is_null($request['buscar'])) {
            $busqueda = '';
        } else {
            $busqueda = $request['buscar'];
        }

        if (is_null($request->departamento)) {
            $departamento = 0;
        } else {
            $departamento = $request->departamento;
        }

        if ($departamento > 0) {
            $carreras = Carrera::with('departamento')
                ->whereLike(['nombre', 'numero_serie'], $busqueda)
                ->where('departamento_id', $departamento)
                ->paginate($cantidad)
            ;
        } else {
            $carreras = Carrera::with('departamento')
                ->whereLike(['nombre', 'numero_serie'], $busqueda)->paginate($cantidad);
        }

        return view('Admin.Carrera.index', compact('carreras', 'cantidad', 'busqueda', 'departamento'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Carrera $carrera)
    {
        $carrera->load('materias', 'grupos.semestre', 'departamento');

        return view('Admin.Carrera.ver', compact('carrera'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CarreraRequest $request)
    {
        $datosvalidados = $request->validated();
        Carrera::create($datosvalidados);

        return CarreraResource::collection(Carrera::paginate(10));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarCarreraRequest $request)
    {
        $datos_validados = $request->validated();
        $id = $request->carrera_id;
        $carrera = Carrera::findOrFail($id);

        $carrera->fill($datos_validados);
        $carrera->save();

        return CarreraResource::collection(Carrera::paginate(10));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrera $carrera)
    {
    }

    public function encontrar(Request $request)
    {
        $carrera = Carrera::findOrFail($request->carrera_id);

        return new CarreraResource($carrera);
    }

    public function eliminar(Request $request)
    {
        $carrera = Carrera::findOrFail($request->carrera_id);

        $carrera->delete();

        return CarreraResource::collection(Carrera::paginate(10));
    }

    public function busqueda(Request $request)
    {
        $search = $request->search;
        $carreras = Carrera::query()
            ->whereLike(['nombre', 'numero_serie'], $search)
            ->get()->take(4);
        $response = [];
        foreach ($carreras as $carrera) {
            $response[] = [
                'id' => $carrera->id,
                'text' => $carrera->nombre.' '.$carrera->numero_serie,
            ];
        }
        echo json_encode($response);
        exit;
    }

    public function buscar(Request $request)
    {
        return view('Admin.Carrera.index', compact('carreras'));
    }

    public function obtenerMaterias(Request $request)
    {
        $id = $request->carreras_id;
        $materias = Materia::where('carreras_id', $id)->get();

        return json_encode($materias);
    }
}
