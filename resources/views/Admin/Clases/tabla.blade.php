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
                <td> <a href="{{ route('clases.ver', $clase) }}">{{ $clase->clave }}</a> </td>
                <td> <a href="{{ route('materias.ver', $clase->materia) }}">{{ $clase->materia->nombre }}</a> </td>
                <td> <a href="{{ route('grupos.ver', $clase->grupo) }}">{{ $clase->grupo->numero }}</a> </td>
                <td> <a href="{{ route('docentes.ver', $clase->docente) }}">{{ $clase->docente->nombre }}</a> </td>
                <td>{{ $clase->horarioCompleto() }}</td>
                <td>{{ $clase->dias }}</td>
                <td>{{ $clase->salon }}</td>-
                <td>{{ $clase->capacidad }}</td>
            </tr>
        @endforeach
    </tbody>                           
</table>