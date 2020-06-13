<?php

namespace App\Http\Controllers;

use App\Actions\ObtenerSemestreActual;
use App\Clase;
use App\Docente;
use App\Semestre;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class UserDocenteController extends Controller
{
    public function home(Docente $docente)
    {
        return view('Docentes.home', compact('docente'));
    }

    public function horario(Docente $docente)
    {
        $obtenerSemestre = new ObtenerSemestreActual();
        $semestre = $this->obtenerSemestre($obtenerSemestre);
        $clases = $this->obtenerClases($docente, $semestre, $obtenerSemestre);

        return view('Docentes.horario', compact('docente', 'clases', 'semestre'));
    }

    public function clase(Docente $docente, Clase $clase)
    {
        $clase->load('materia', 'grupo', 'calificaciones.alumno');

        return view('Docentes.Clases.ver', compact('clase', 'docente'));
    }

    public function materiales(Docente $docente)
    {
        $obtenerSemestre = new ObtenerSemestreActual();
        $semestre = $this->obtenerSemestre($obtenerSemestre);
        $clases = $this->obtenerClases($docente, $semestre, $obtenerSemestre);
        $materiales = new Collection();
        foreach ($clases as $clase) {
            $materiales = $materiales->merge($clase->materiales);
        }

        return view('Docentes.materiales', compact('docente', 'materiales', 'semestre'));
    }

    private function obtenerSemestre(ObtenerSemestreActual $obtenerSemestre)
    {
        $semestre = $obtenerSemestre->obtenerSemestre(Carbon::today());

        if (is_null($semestre)) {
            $semestre = Semestre::first();
        }

        return $semestre;
    }

    private function obtenerClases(Docente $docente, Semestre $semestre, ObtenerSemestreActual $obtenerSemestre)
    {
        $docente->load('clases.grupo', 'clases.materia');

        return $obtenerSemestre->obtenerClasesDocenteActuales($docente->clases, $semestre->grupos);
    }
}
