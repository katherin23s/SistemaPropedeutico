<div class="table-responsive">                           
    <table class="table" id="tabla-clases" >
        <thead class=" text-primary" >
            <th scope="col">Materia</th>
            <th scope="col">Grupo</th>
            <th scope="col">Horario</th>
            <th scope="col">Dias</th>
            <th scope="col">Salon</th>
        </thead>
        <tbody>
            @foreach ($clases as $clase)
                <tr>
                    <td> <a href="{{ route('docente.clase.ver', [$docente, $clase]) }}">{{ $clase->materia->nombre }}</a></td>
                    <td> {{ $clase->grupo->numero }}</td>
                    <td>{{ $clase->horarioCompleto() }}</td>
                    <td>{{ $clase->dias }}</td>
                    <td>{{ $clase->salon }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div> 