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
        $planteles = Plantel::paginate(15);
        return view('planteles.index', compact('planteles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plantel  $plantel
     * @return \Illuminate\Http\Response
     */
    public function show(Plantel $plantel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plantel  $plantel
     * @return \Illuminate\Http\Response
     */
    public function edit(Plantel $plantel)
    {
        //
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
        //
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
