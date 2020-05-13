<?php

namespace App\Http\Controllers;

use App\Documento;
use App\Http\Requests\ActualizarDocumentoRequest;
use App\Http\Requests\DocumentoRequest;
use App\Http\Requests\RevisarDocumentoRequest;
use App\Http\Resources\DocumentoResource;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DocumentoController extends Controller
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
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentoRequest $request)
    {
        $validados = $request->validated();
        $validados['fecha'] = Carbon::today();
        $validados['estado'] = 0;
        $documento = Documento::create($validados);

        return new DocumentoResource($documento);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Documento $documento)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Documento $documento)
    {
    }

    public function encontrar(Request $request)
    {
        $documento = Documento::findOrFail($request->documento_id);

        return new DocumentoResource($documento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarDocumentoRequest $request)
    {
        $validados = $request->validated();
        $documento = Documento::findOrFail($validados['id']);
        $validados['estado'] = 0;

        return new DocumentoResource($documento);
    }

    public function revisar(RevisarDocumentoRequest $request)
    {
        $validados = $request->validated();
        $documento = Documento::findOrFail($validados['id']);

        return new DocumentoResource($documento);
    }

    public function documentosAlumno(Request $request)
    {
        $documentos = Documento::where('alumno_id', $request['alumno_id'])
            ->get()
        ;

        return DocumentoResource::collection($documentos);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request)
    {
        $documento = Documento::findOrFail($request->documento_id);

        $documento->delete();

        return 'OK';
    }
}
