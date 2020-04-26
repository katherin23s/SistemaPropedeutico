<?php

namespace App\Http\Controllers;

use App\Departamento;
use App\Http\Resources\DepartamentoResource;
use App\Plantel;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
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

        if (is_null($request->plantel_id)) {
            $plantel_id = 0;
        } else {
            $plantel_id = $request->plantel_id;
        }

        if ($plantel_id > 0) {
            $departamentos = Departamento::whereLike('nombre', $busqueda)
                ->where('plantel_id', $plantel_id)
                ->paginate($cantidad)
            ;
        } else {
            $departamentos = Departamento::whereLike('nombre', $busqueda)->paginate($cantidad);
        }

        $planteles = Plantel::get();

        return view('Admin.Departamento.index', compact(
            'departamentos',
            'planteles',
            'cantidad',
            'busqueda',
            'plantel_id'
        ));
    }

    public function encontrar(Request $request)
    {
        $id = $request->departamento_id;
        $departamento = Departamento::find($id);

        return json_encode($departamento);
    }

    public function obtenerPlanteles(Request $request)
    {
        $id = $request->departamento_id;
        $departamentos = Departamento::where('departamento_id', $id)->get();

        return json_encode($departamentos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos_validados = $this->validar();
        Departamento::create($datos_validados);

        return DepartamentoResource::collection(Departamento::paginate(10));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Departamento $departamento)
    {
        $departamento->load('docentes', 'carreras');

        return view('Admin.Departamento.ver', compact('departamento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Departamento $departamento
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //solo para editar / actualizar
        $id = $request->departamento_id;
        $nombre = $request->nombre;
        $departamento = Departamento::find($id);
        $departamento->nombre = $nombre;
        $departamento->save();

        return DepartamentoResource::collection(Departamento::paginate(10));
    }

    public function eliminar(Request $request)
    {
        //solo para editar / actualizar
        $id = $request->departamento_id;
        $departamento = Departamento::find($id);
        $departamento->delete();

        return DepartamentoResource::collection(Departamento::paginate(10));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Departamento $departamento
     *
     * @return \Illuminate\Http\Response
     */
    public function busqueda(Request $request)
    {
        $search = $request->search;
        $departamentos = Departamento::query()
            ->whereLike(['nombre'], $search)
            ->get()->take(4);
        $response = [];
        foreach ($departamentos as $departamento) {
            $response[] = [
                'id' => $departamento->id,
                'text' => $departamento->nombre,
            ];
        }
        echo json_encode($response);
        exit;
    }

    public function validar()
    {
        return request()->validate(Departamento::$rules);
    }
}
