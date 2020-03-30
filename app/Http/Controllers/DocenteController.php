<?php

namespace App\Http\Controllers;

use App\Docente;
use App\Http\Requests\ActualizarDocenteRequest;
use App\Http\Requests\RegistrarDocenteRequest;
use App\Http\Resources\DocenteResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docentes = Docente::with('departamento')->paginate(15);

        return view('Admin.Docentes.index', compact('docentes'));
    }

    public function store(RegistrarDocenteRequest $request)
    {
        $validados = $request->validated();
        $validados['password'] = Hash::make($validados['password']);
        Docente::create($validados);

        $docentes = Docente::with('departamento')->paginate(15);

        return DocenteResource::collection($docentes);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Docente $docente)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarDocenteRequest $request)
    {
        $datos_validados = $request->validated();
        $id = $request->docente_id;
        $docente = Docente::findOrFail($id);

        $docente->fill($datos_validados);
        $docente->save();

        $docentes = Docente::with('departamento')->paginate(15);

        return DocenteResource::collection($docentes);
    }

    public function encontrar(Request $request)
    {
        $docente = Docente::findOrFail($request->docente_id);

        return new DocenteResource($docente);
    }

    public function eliminar(Request $request)
    {
        $docente = Docente::findOrFail($request->docente_id);

        $docente->delete();

        $docentes = Docente::with('departamento')->paginate(15);

        return DocenteResource::collection($docentes);
    }

    public function busqueda(Request $request)
    {
        $search = $request->search;
        $docentes = docente::query()
            ->whereLike(['nombre', 'numero_empleado'], $search)
            ->get()->take(4);
        $response = [];
        foreach ($docentes as $docente) {
            $response[] = [
                'id' => $docente->id,
                'text' => $docente->nombre.' '.$docente->numero_empleado,
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
            $docentes = Docente::with('departamento')
                ->whereLike(['nombre', 'numero_empleado', 'email'], $busqueda)
                ->where('departamento_id', $departamento_id)
                ->paginate(15)
            ;
        } else {
            $docentes = Docente::with('departamento')
                ->whereLike(['nombre', 'numero_empleado', 'email'], $busqueda)->paginate(15);
        }

        return view('Admin.Docentes.index', compact('docentes'));
    }
}
