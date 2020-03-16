<?php

namespace App\Http\Controllers;

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
    public function index()
    {
        //el index donde se muestra la lista de todos los materiaes
        $materias = Materia::paginate(15);

        return view('Admin.materia.index', compact('materias'));
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
}
