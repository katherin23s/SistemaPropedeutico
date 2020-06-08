<?php

namespace App\Http\Controllers;

use App\Actions\ObtenerSemestreActual;
use App\Clase;
use App\Docente;
use App\Semestre;
use Carbon\Carbon;

class UserDocenteController extends Controller
{
    public function home(Docente $docente)
    {
        return view('Docentes.home', compact('docente'));
    }

    public function horario(Docente $docente)
    {
        $docente->load('clases.grupo', 'clases.materia');
        $obtenerSemestre = new ObtenerSemestreActual();
        $semestre = $obtenerSemestre->obtenerSemestre(Carbon::today());

        if (is_null($semestre)) {
            $semestre = Semestre::first();
        }

        $clases = $obtenerSemestre->obtenerClasesDocenteActuales($docente->clases, $semestre->grupos);

        return view('Docentes.horario', compact('docente', 'clases', 'semestre'));
    }

    public function clase(Docente $docente, Clase $clase)
    {
        $clase->load('materia', 'grupo', 'calificaciones.alumno');

        return view('Docentes.Clases.ver', compact('clase', 'docente'));
    }

    public function evidencias(Docente $docente)
    {
    }
}
