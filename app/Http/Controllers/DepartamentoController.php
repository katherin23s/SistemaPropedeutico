<?php

namespace App\Http\Controllers;

use App\Departamento;
use App\Plantel;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //el index donde se muestra la lista de todos los planteles
        $departamentos = Departamento::paginate(15);
        $planteles = Plantel::get();
        return view('Admin.Departamento.index', compact('departamentos', 'planteles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos_validados = $this->validar();
        Departamento::create($datos_validados);

        return response()->json(['status' => 'xd'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function show(Departamento $departamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Departamento $departamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Departamento  $departamento
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

        return json_encode('OK', 200);
    }

    public function eliminar(Request $request)
    {
        //solo para editar / actualizar
        $id = $request->departamento_id;
        $departamento = Departamento::find($id);
        $departamento->delete();

        return json_encode('OK', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Departamento  $departamento
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
