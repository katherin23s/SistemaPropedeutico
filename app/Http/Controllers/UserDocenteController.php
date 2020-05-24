<?php

namespace App\Http\Controllers;

use App\Actions\ObtenerSemestreActual;
use App\Docente;
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

        $clases = $obtenerSemestre->obtenerClasesDocenteActuales($docente->clases, $semestre->grupos);

        return view('Docentes.horario', compact('docente', 'clases', 'semestre'));
    }
}
