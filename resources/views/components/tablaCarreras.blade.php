<div class="table-responsive">                           
    <table class="table" id="tabla-carreras" >
        <thead class=" text-primary" >
            <th scope="col">Carrera</th>
            <th scope="col">No. Serie</th>
        </thead>
        <tbody>
            @foreach ($carreras as $carrera)
                <tr>
                    <td>{{ $carrera->nombre }}</td>
                    <td>{{ $carrera->numero_serie}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div> 