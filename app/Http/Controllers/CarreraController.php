<?php

namespace App\Http\Controllers;

use App\Carrera;
use App\Http\Requests\CarreraRequest;
use App\Http\Resources\CarreraResource;
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
        //el index donde se muestra la lista de todos los planteles
        $carreras = Carrera::paginate(15);

        return view('Admin.Carrera.index', compact('carreras'));
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
    public function store(CarreraRequest $request)
    {
        $datosvalidados = $request->validated();
        $carrera = Carrera::create($datosvalidados);

        return json_encode($carrera);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Carrera $carrera)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrera $carrera)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrera $carrera)
    {
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
        $carrera = Carrera::find($request->carrera_id);

        return new CarreraResource($carrera);
    }
}
