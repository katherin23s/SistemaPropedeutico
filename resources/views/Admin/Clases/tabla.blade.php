<table class="table" id="tabla-clases" >
    <thead class=" text-primary" >
        <th scope="col">Clave</th>
        <th scope="col">Materia</th>
        <th scope="col">Grupo</th>
        <th scope="col">Docente</th>
        <th scope="col">Horario</th>
        <th scope="col">Dias</th>
        <th scope="col">Salon</th>
        <th scope="col">Capacidad</th>
    </thead>
    <tbody>
        @foreach ($clases as $clase)
            <tr>
                <td>{{ $clase->clave }}</td>
                <td>{{ $clase->materia->nombre}}</td>
                <td>{{ $clase->grupo->numero}}</td>
                <td>{{ $clase->docente->nombre}}</td>
                <td>{{ $clase->horarioCompleto() }}</td>
                <td>{{ $clase->dias }}</td>
                <td>{{ $clase->salon }}</td>-
                <td>{{ $clase->capacidad }}</td>
            </tr>
        @endforeach
    </tbody>                           
</table>