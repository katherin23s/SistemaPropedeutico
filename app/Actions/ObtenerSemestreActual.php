<?php

namespace App\Actions;

use App\Clase;
use App\Semestre;

class ObtenerSemestreActual
{
    public function obtenerSemestre($fecha)
    {
        return Semestre::with('grupos')->where([
            ['fecha_inicio', '<=', $fecha],
            ['fecha_final', '>', $fecha],
        ])->first();
    }

    public function obtenerClasesDocenteActuales($clases_docente, $grupos_actuales)
    {
        //Clases del docente
        //Grupos del semestre actual

        //O1.Recorremos cada clase del docente, y comparamos su grupo_id que tambien se encuentre
        //en la lista de grupos actuales => lista de clases

        //Requisitos O1:
        //Lista de clases del docente
        //Lista de grupos actuales

        $ids_grupos = [];
        $clases_actuales_docente = [];
        foreach ($grupos_actuales as $grupo) {
            $ids_grupos[] = $grupo->id;
        }

        foreach ($clases_docente as $clase) {
            if (in_array($clase->grupo_id, $ids_grupos)) {
                $clases_actuales_docente[] = $clase;
            }
        }

        $collection = collect($clases_actuales_docente);

        return $collection->sortBy('hora_inicio')->values();
        //O2. Recorrer cada grupo, recorrer cada clase de cada grupo, y comparar su docente_id
        //que tambien se encuentre en la lista de clases del docente => lista de clases

        /* $clases = Clase::where([
            ['fecha_inicio', '<=', $fecha],
            ['fecha_final', '>', $fecha],
        ]) */
    }
}
