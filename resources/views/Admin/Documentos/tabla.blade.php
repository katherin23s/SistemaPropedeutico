<div class="table-responsive">
    <table class="table" id="tabla-documentos">
        <thead>
            <th scope="col">Nombre</th>
            <th scope="col">Alumno</th>
            <th scope="col">Fecha</th>
            <th scope="col">Ubicación</th>
            <th scope="col">Estado</th>
            <th scope="col">Comentarios</th>
            <th scope="col"></th>
        </thead>
        <tbody>
            @foreach ($documentos as $documento)
                <tr id="fila{{ $documento->id }}" class="{{ $documento->clase() }}">
                    <td>{{ $documento->nombre }}</td>
                    <td><a href="{{ route('alumno.ver', $documento->alumno) }}">{{ $documento->alumno->nombre }}</a></td>
                    <td>{{ $documento->fecha->format('d-m-Y')}}</td>
                    <td>{{ $documento->ubicacion }}</td>
                    <td id="estado{{ $documento->id }}">{{ $documento->estado() }}</td>
                    <td id="comentarios{{ $documento->id }}">{{ $documento->comentarios }}</td>
                    <td class="td-actions text-right">
                        <button class="btn btn-info btn-sm btn-icon" rel="tooltip"  type="button" onClick="obtenerDatos({{ $documento->id }})">
                                <i class="fas fa-pencil-alt fa-2 "></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="card-footer py-4">
        <nav class="d-flex justify-content-end" aria-label="...">
            {{ $documentos->appends(['busqueda'=>$busqueda, 'cantidad'=>$cantidad, 'estado'=>$estado])->links() }}
        </nav>
    </div>
</div>  