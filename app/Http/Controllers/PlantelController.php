<?php

namespace App\Http\Controllers;

use App\Departamento;
use App\Http\Requests\ActualizarPlantelRequest;
use App\Http\Resources\PlantelResource;
use App\Plantel;
use Illuminate\Http\Request;

class PlantelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //el index donde se muestra la lista de todos los planteles
        $planteles = Plantel::paginate(15);

        return view('Admin.Planteles.index', compact('planteles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //solo dirige a la vista para crear un nuevo plantel
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //solo guarda el nuevo plantel
        $datos_validados = $this->validar();
        Plantel::create($datos_validados);

        return PlantelResource::collection(Plantel::paginate(10));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Plantel $plantel)
    {
        //la vista de un solo plantel
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Plantel $plantel)
    {
        //solo dirige a la vista para editar
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarPlantelRequest $request)
    {
        //solo para editar / actualizar
        $datos_validados = $request->validated();
        $id = $request->plantel_id;
        $plantel = Plantel::findOrFail($id);

        $plantel->fill($datos_validados);
        $plantel->save();

        return PlantelResource::collection(Plantel::paginate(10));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Plantel $plantel
     *
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request)
    {
        $id = $request->plantel_id;
        $plantel = Plantel::findOrFail($id);
        $plantel->delete();

        return PlantelResource::collection(Plantel::paginate(10));
    }

    public function encontrar(Request $request)
    {
        $id = $request->plantel_id;
        $plantel = Plantel::findOrFail($id);

        return json_encode($plantel);
    }

    public function obtenerDepartamentos(Request $request)
    {
        $id = $request->plantel_id;
        $departamentos = Departamento::where('plantel_id', $id)->get();

        return json_encode($departamentos);
    }

    public function validar()
    {
        return request()->validate(Plantel::$rules);
    }

    public function buscar(Request $request)
    {
        if (is_null($request['buscar'])) {
            $busqueda = '';
        } else {
            $busqueda = $request['buscar'];
        }
        $planteles = Plantel::whereLike('nombre', $busqueda)->paginate(15);

        return view('Admin.Planteles.index', compact('planteles'));
    }
}
