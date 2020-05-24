<?php

namespace App\Http\Controllers;

use App\Calificacion;
use App\CalificacionUnidad;
use App\Http\Requests\ActualizarCalificacionUnidadRequest;
use App\Http\Resources\CalificacionUnidadResource;
use App\Mail\CalificacionActualizada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CalificacionUnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(CalificacionUnidad $calificacionUnidad)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(CalificacionUnidad $calificacionUnidad)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CalificacionUnidad $calificacionUnidad)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(CalificacionUnidad $calificacionUnidad)
    {
    }

    public function actualizarValor(ActualizarCalificacionUnidadRequest $request)
    {
        $calificacion_unidad = CalificacionUnidad::findOrFail($request['calificacion_id']);
        $calificacion_unidad->valor = $request['valor'];
        $calificacion_unidad->habilitada = true;
        $calificacion_unidad->save();

        $calificacion = Calificacion::findOrFail($calificacion_unidad->calificacion_id);
        $calificacion->calcularPromedio();

        $calificacion_unidad->load('calificacion.clase.docente', 'calificacion.clase.materia', 'calificacion.alumno');

        Mail::to($calificacion_unidad->calificacion->alumno->email)->send(
            new CalificacionActualizada($calificacion_unidad)
        );

        return new CalificacionUnidadResource($calificacion_unidad);
    }
}
