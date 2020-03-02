<?php

namespace App\Http\Controllers;

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
     * @param  \App\Plantel  $plantel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plantel $plantel)
    {
        //solo para editar / actualizar
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plantel  $plantel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plantel $plantel)
    {
        //
    }
}
