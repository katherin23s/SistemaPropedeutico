<?php

namespace App\Http\Controllers;

use App\Events\MaterialRevisado;
use App\Http\Requests\ActualizarMaterialRequest;
use App\Http\Requests\MaterialRequest;
use App\Http\Requests\RevisarMaterialRequest;
use App\Http\Resources\MaterialResource;
use App\Material;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (is_null($request->cantidad)) {
            $cantidad = 10;
        } else {
            $cantidad = $request->cantidad;
        }

        if (is_null($request->busqueda)) {
            $busqueda = '';
        } else {
            $busqueda = $request->busqueda;
        }

        if (is_null($request->estado)) {
            $estado = 10;
        } else {
            $estado = $request->estado;
        }
        if ($estado < 10) {
            $materiales = Material::with('clase')->whereLike(['clase.clave', 'nombre'], $busqueda)
                ->where('estado', $estado)
                ->orderBy('updated_at', 'desc')
                ->paginate($cantidad)
            ;
        } else {
            $materiales = Material::with('clase')->whereLike(['clase.clave', 'nombre'], $busqueda)->paginate($cantidad);
        }

        return view('Admin.Materiales.index', compact('materiales', 'cantidad', 'busqueda', 'estado'));
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
    public function store(MaterialRequest $request)
    {
        $validados = $request->validated();
        $validados['fecha'] = Carbon::today();
        $validados['estado'] = 0;
        $material = Material::create($validados);

        return new MaterialResource($material);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
    }

    public function encontrar(Request $request)
    {
        $material = Material::findOrFail($request->material_id);

        return new MaterialResource($material);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarMaterialRequest $request) //docente
    {
        $validados = $request->validated();
        $material = Material::findOrFail($validados['id']);
        $validados['estado'] = 0;
        $material->fill($validados);
        $material->save();

        return new MaterialResource($material);
    }

    public function revisar(RevisarMaterialRequest $request)
    {
        $validados = $request->validated();
        $material = Material::findOrFail($validados['material_id']);
        $material->fill($validados);
        $material->save();

        event(new MaterialRevisado($material));

        return new MaterialResource($material);
    }

    public function materialesClase(Request $request)
    {
        $materiales = Material::where('clase_id', $request['clase_id'])
            ->get()
        ;

        return MaterialResource::collection($materiales);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request)
    {
        $material = Material::findOrFail($request->material_id);

        $material->delete();

        return 'OK';
    }
}
