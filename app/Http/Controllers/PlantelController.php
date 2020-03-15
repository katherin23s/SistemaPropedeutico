<?php

namespace App\Http\Controllers;

use App\Departamento;
use App\Http\Requests\ActualizarPlantelRequest;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //solo guarda el nuevo plantel
        $datos_validados = $this->validar();
        Plantel::create($datos_validados);

        return response()->json(['status' => 'xd'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plantel  $plantel
     * @return \Illuminate\Http\Response
     */
    public function show(Plantel $plantel)
    {
        //la vista de un solo plantel
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plantel  $plantel
     * @return \Illuminate\Http\Response
     */
    public function edit(Plantel $plantel)
    {
        //solo dirige a la vista para editar
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarPlantelRequest $request)
    {
        //solo para editar / actualizar
        $id = $request->plantel_id;
        $plantel = Plantel::findOrFail($id);
        $datos_validados = $request->validated();

        $plantel->fill($datos_validados);
        $plantel->save();

        return response('OK', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plantel  $plantel
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request)
    {
        //solo para editar / actualizar
        $id = $request->plantel_id;
        $departamento = Plantel::find($id);
        $departamento->delete();

        return json_encode('OK', 200);
    }

    public function encontrar(Request $request)
    {
        $id = $request->plantel_id;
        $plantel = Plantel::find($id);
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
}
