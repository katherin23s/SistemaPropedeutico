<div class="table-responsive">                           
    <table class="table" id="tabla-calificaciones" >
        <thead class=" text-primary" >
            <th scope="col">Clase</th>
            <th scope="col">Promedio</th>
            <th scope="col">U1</th>
            <th scope="col">U2</th>
            <th scope="col">U3</th>
            <th scope="col">U4</th>
            <th scope="col">U5</th>
            <th scope="col">U6</th>
        </thead>
        <tbody>
            @foreach ($calificaciones as $calificacion)
                <tr>
                    <td>{{ $calificacion->clase->materia->nombre }}</td>
                    <td>{{ $calificacion->promedio() }}</td>
                    @foreach ($calificacion->calificaciones as $calificacion)
                        <td class="{{ $calificacion->valor < 70 ? 'bg-danger' : 'bg-success' }}">{{ $calificacion->valor() }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div> 