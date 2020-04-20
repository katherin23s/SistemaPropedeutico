<?php

namespace App\Http\Controllers;

use App\Carrera;
use App\Departamento;
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
    public function index()
    {
        //el index donde se muestra la lista de todos los carreras con su departamento
        $carreras = Carrera::with('departamento')->paginate(15);

        return view('Admin.Carrera.index', compact('carreras'));
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
        if (is_null($request['buscar'])) {
            $busqueda = '';
        } else {
            $busqueda = $request['buscar'];
        }

        $departamento_id = $request['departamento'];
        if ($departamento_id > 0) {
            $carreras = Carrera::with('departamento')
                ->whereLike(['nombre', 'numero_serie'], $busqueda)
                ->where('departamento_id', $departamento_id)
                ->paginate(15)
            ;
        } else {
            $carreras = Carrera::with('departamento')
                ->whereLike(['nombre', 'numero_serie'], $busqueda)->paginate(15);
        }

        return view('Admin.Carrera.index', compact('carreras'));
    }

    public function obtenerMaterias(Request $request)
    {
        $id = $request->carreras_id;
        $materias = Materia::where('carreras_id', $id)->get();

        return json_encode($materias);
    }
}
