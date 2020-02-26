<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        return view('dashboard');
    }

    public function departamento()
    {
        return view('users.Departamento');
    }

}
