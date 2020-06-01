<div class="table-responsive">
    <table class="table" id="tabla-materiales">
        <thead>
            <th scope="col">Material</th>
            <th scope="col">Clase</th>
            <th scope="col">Fecha</th>
            <th scope="col">Ubicación</th>
            <th scope="col">Estado</th>
            <th scope="col">Comentarios</th>
            <th scope="col"></th>
        </thead>
        <tbody>
            @foreach ($materiales as $material)
                <tr id="fila{{ $material->id }}" class="{{ $material->clase() }}">
                    <td>{{ $material->nombre }}</td>
                    <td><a href="{{ route('clases.ver', $material->clase) }}">{{ $material->clase->clave }}</a></td>
                    <td>{{ $material->fecha->format('d-m-Y')}}</td>
                    <td><a href="{{ $material->ubicacion }}">{{ $material->ubicacion }}</a></td>
                    <td id="estado{{ $material->id }}">{{ $material->estado() }}</td>
                    <td id="comentarios{{ $material->id }}">{{ $material->comentarios }}</td>
                    <td class="td-actions text-right">
                        <button class="btn btn-info btn-sm btn-icon" rel="tooltip"  type="button" onClick="obtenerDatos({{ $material->id }})">
                                <i class="fas fa-pencil-alt fa-2 "></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>  
@include('Admin.Materiales.editarModal')