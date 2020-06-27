<?php

namespace App\Http\Controllers;

use App\Clase;
use App\Http\Requests\ActualizarMateriaRequest;
use App\Http\Requests\MateriaRequest;
use App\Http\Resources\MateriaResource;
use App\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
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
        if ($carrera > 0) {
            $materias = Materia::with('carrera')
                ->whereLike(['nombre', 'clave'], $busqueda)
                ->where('carrera_id', $carrera)
                ->paginate($cantidad)
            ;
        } else {
            $materias = Materia::with('carrera')
                ->whereLike(['nombre', 'clave'], $busqueda)->paginate($cantidad);
        }

        return view('Admin.Materias.index', compact('materias', 'cantidad', 'busqueda'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(MateriaRequest $request)
    {
        $datosvalidados = $request->validated();
        Materia::create($datosvalidados);

        return MateriaResource::collection(Materia::paginate(10));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Materia $materia)
    {
        $materia->load('carrera');

        $clases = Clase::with('grupo', 'docente', 'materia')
            ->where('materia_id', $materia->id)
            ->orderBy('updated_at', 'desc')
            ->paginate(15)
        ;

        return view('Admin.Materias.ver', compact('materia', 'clases'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarMateriaRequest $request)
    {
        $datos_validados = $request->validated();
        $id = $request->materia_id;
        $materia = Materia::findOrFail($id);

        $materia->fill($datos_validados);
        $materia->save();

        return MateriaResource::collection(Materia::paginate(10));
    }

    public function encontrar(Request $request)
    {
        $materia = Materia::findOrFail($request->materia_id);

        return new MateriaResource($materia);
    }

    public function eliminar(Request $request)
    {
        $materia = Materia::findOrFail($request->materia_id);

        $materia->delete();

        return MateriaResource::collection(Materia::paginate(10));
    }

    public function busqueda(Request $request)
    {
        $search = $request->search;
        $materias = Materia::query()
            ->whereLike(['nombre', 'clave'], $search)
            ->get()->take(4);
        $response = [];
        foreach ($materias as $materia) {
            $response[] = [
                'id' => $materia->id,
                'text' => $materia->nombre.' '.$materia->clave,
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

        $carrera_id = $request['carrera'];
        if ($carrera_id > 0) {
            $materias = Materia::with('carrera')
                ->whereLike(['nombre', 'clave'], $busqueda)
                ->where('carrera_id', $carrera_id)
                ->paginate(15)
            ;
        } else {
            $materias = Materia::with('carrera')
                ->whereLike(['nombre', 'clave'], $busqueda)->paginate(15);
        }

        return view('Admin.Materias.index', compact('materias'));
    }
}
