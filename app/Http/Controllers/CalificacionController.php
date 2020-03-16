<?php

namespace App\Http\Controllers;

use App\Calificacion;
use App\Http\Requests\ActualizarCalificacionRequest;
use App\Http\Requests\CalificacionRequest;
use App\Http\Resources\CalificacionResource;
use Illuminate\Http\Request;

class CalificacionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CalificacionRequest $request)
    {
        $datosvalidados = $request->validated();
        Calificacion::create($datosvalidados);

        return $this->obtenerCalificacionesPertenecientes($request->alumno_id, $request->clase_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarCalificacionRequest $request)
    {
        $datos_validados = $request->validated();
        $id = $request->calificacion_id;
        $calificacion = Calificacion::findOrFail($id);

        $calificacion->fill($datos_validados);
        $calificacion->save();

        return $this->obtenerCalificacionesPertenecientes($request->alumno_id, $request->clase_id);
    }

    public function eliminar(Request $request)
    {
        $calificacion = Calificacion::findOrFail($request->calificacion_id);

        $calificacion->delete();

        return $this->obtenerCalificacionesPertenecientes($request->alumno_id, $request->clase_id);
    }

    public function obtenerCalificacionesPertenecientes($alumno_id, $clase_id)
    {
        //calificaciones que le pertenecen al alumno y a su respectiva clase
        $calificaciones = Calificacion::where('alumno_id', $alumno_id)
            ->where('clase_id', $clase_id)
            ->paginate(5)
        ;

        return CalificacionResource::collection($calificaciones);
    }
}
