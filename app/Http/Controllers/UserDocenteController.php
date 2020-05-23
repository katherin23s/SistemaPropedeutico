<?php

namespace App\Http\Controllers;

use App\Docente;

class UserDocenteController extends Controller
{
    public function home(Docente $docente)
    {
        return view('Docentes.home', compact('docente'));
    }

    public function horario(Docente $docente)
    {
        $docente->load('grupo.clases');

        return view('Docentes.horario', compact('docente'));
    }
}
