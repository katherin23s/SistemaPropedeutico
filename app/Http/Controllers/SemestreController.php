<?php

namespace App\Http\Controllers;

use App\Grupo;
use App\Http\Requests\ActualizarSemestreRequest;
use App\Http\Requests\SemestreRequest;
use App\Http\Resources\SemestreResource;
use App\Semestre;
use Illuminate\Http\Request;

class SemestreController extends Controller
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

        //el index donde se muestra la lista de todos los semestrees
        $semestres = Semestre::whereLike('numero', $busqueda)->paginate($cantidad);

        return view('Admin.Semestre.index', compact('semestres', 'cantidad', 'busqueda'));
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
    public function store(SemestreRequest $request)
    {
        $datosvalidados = $request->validated();
        Semestre::create($datosvalidados);

        return SemestreResource::collection(Semestre::paginate(10));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Semestre $semestre)
    {
        $grupos = Grupo::with('carrera')->where('semestre_id', $semestre->id)->paginate();

        return view('Admin.Semestre.ver', compact('semestre', 'grupos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Semestre $semestre)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarSemestreRequest $request)
    {
        $datos_validados = $request->validated();
        $id = $request->semestre_id;
        $semestre = Semestre::findOrFail($id);

        $semestre->fill($datos_validados);
        $semestre->save();

        return SemestreResource::collection(Semestre::paginate(10));
    }

    public function eliminar(Request $request)
    {
        $id = $request->semestre_id;
        $semestre = Semestre::findOrFail($id);
        $semestre->delete();

        return SemestreResource::collection(Semestre::paginate(10));
    }

    public function encontrar(Request $request)
    {
        $id = $request->semestre_id;
        $semestre = Semestre::findOrFail($id);

        return new SemestreResource($semestre);
    }

    public function busqueda(Request $request)
    {
        $search = $request->search;
        $semestres = Semestre::query()
            ->whereLike(['numero'], $search)
            ->get()->take(4);
        $response = [];
        foreach ($semestres as $semestre) {
            $response[] = [
                'id' => $semestre->id,
                'text' => $semestre->numero.' '.$semestre->periodo(),
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
        $semestres = Semestre::whereLike('numero', $busqueda)->paginate(15);

        return view('Admin.Semestre.index', compact('semestres'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Semestre $semestre)
    {
    }
}
