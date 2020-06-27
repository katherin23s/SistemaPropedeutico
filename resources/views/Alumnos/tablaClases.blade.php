<div class="table-responsive">                           
    <table class="table" id="tabla-clases" >
        <thead class=" text-primary" >
            <th scope="col">Materia</th>
            <th scope="col">Docente</th>
            <th scope="col">Horario</th>
            <th scope="col">Dias</th>
            <th scope="col">Salon</th>
        </thead>
        <tbody>
            @foreach ($clases as $clase)
                <tr>
                    <td> {{ $clase->materia->nombre }}</td>
                    <td> {{ $clase->docente->nombre }}</td>
                    <td>{{ $clase->horarioCompleto() }}</td>
                    <td>{{ $clase->dias }}</td>
                    <td>{{ $clase->salon }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div> 