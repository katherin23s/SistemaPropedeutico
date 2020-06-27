@extends('layouts.app', ['page' => 'Clases', 'pageSlug' => 'clases'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">  
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Clases</h4>
                        <div class="row">
                            <div class="col-md-1">   
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#AgregarModal" data-whatever="@mdo">Agregar</button>   
                            </div>          
                            <div class="col-md-11">
                                <!-- Search form -->
                                <form  method="get" action="{{ route('clases.index') }}" >                              
                                    <div class="form-row">
                                        <div class="col-md-2">
                                            <select name="cantidad"> 
                                                <option value='10' {{ $cantidad == 10 ? 'selected' : '' }} >10</option>
                                                <option value='15' {{ $cantidad == 15 ? 'selected' : '' }}>15</option>
                                                <option value='20' {{ $cantidad == 20 ? 'selected' : '' }}>20</option>
                                                <option value='50' {{ $cantidad == 50 ? 'selected' : '' }}>50</option>
                                                <option value='100' {{ $cantidad == 100 ? 'selected' : '' }}>100</option>
                                                <option value='5000' {{ $cantidad == 5000 ? 'selected' : '' }}>Todos</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select id='grupo' class="custom-select" name="grupo"> 
                                                <option value='0'>Grupo</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select id='materia' class="custom-select" name="materia"> 
                                                <option value='0'>Materia</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-auto">
                                            <input name="busqueda" class="form-control" type="text" value="{{ $busqueda }}" placeholder="Buscar" aria-label="Search"> 
                                        </div> 
                                        <div class="col-md-1">
                                            <button class="btn btn-primary btn-fab btn-icon">
                                                <i class="fas fa-search"></i>
                                              </button>
                                        </div>                  
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                
                    <div class="card-body">
                        @include('alerts.success')     
                        <div class="table-responsive">                           
                            <table class="table" id="tabla-clases" >
                                <thead class=" text-primary" >
                                    <th scope="col">Clave</th>
                                    <th scope="col">Materia</th>
                                    <th scope="col">Docente</th>
                                    <th scope="col">Grupo</th>
                                    <th scope="col">Carrera</th>
                                    <th scope="col">Salon</th>
                                    <th scope="col">Horario</th>
                                </thead>
                                <tbody>
                                    @foreach ($clases as $clase)
                                        <tr>
                                            <td> <a href="{{ route('clases.ver', $clase) }}">{{ $clase->clave }}</a> </td>
                                            <td> <a href="{{ route('materias.ver', $clase->materia) }}">{{ $clase->materia->nombre }}</a> </td>
                                            <td> <a href="{{ route('docentes.ver', $clase->docente) }}">{{ $clase->docente->nombre }}</a> </td>
                                            <td> <a href="{{ route('grupos.ver', $clase->grupo) }}">{{ $clase->grupo->numero }}</a> </td>
                                            <td> <a href="{{ route('carreras.ver', $clase->grupo->carrera) }}">{{ $clase->grupo->carrera->nombre }}</a> </td>
                                            <td>{{ $clase->salon }}</td>
                                            <td>{{ $clase->horarioCompleto()}}</td>
                                            <td class="td-actions text-right">
                                            <button class="btn btn-info btn-sm btn-icon" rel="tooltip"  type="button" onClick="mostrarModalEditar({{ $clase->id }})">
                                                    <i class="fas fa-pencil-alt fa-2 "></i>
                                            </button>
                                            <a rel="tooltip" class="btn btn-success btn-sm btn-icon" type="button" href=" {{ route('clases.ver', $clase) }} ">
                                                    <i class="fa fa-eye "></i>
                                            </a>
                                            <button rel="tooltip" class="btn btn-danger btn-sm btn-icon"  type="button" onClick="Eliminar({{ $clase->id }})">
                                                    <i class="fas fa-trash"></i>
                                            </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>                                  
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $clases->appends(['busqueda'=>$busqueda, 'cantidad'=>$cantidad])->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('Admin.Clases.agregarModal')
@include('Admin.Clases.editarModal')
@endsection
@push('js')
<script>
    function mostrarClases(data){
        var clases = data;
        var output = "";

        for(var i = 0; i < clases.length; i++){
            output += "<tr value="+clases[i].id+">"
                + "<td>" + clases[i].clave + "</td>"
                + "<td>" + clases[i].materia + "</td>" 
                + "<td>" + clases[i].docente + "</td>"
                + "<td>" + clases[i].grupo + "</td>" 
                + "<td>" + clases[i].carrera + "</td>" 
                + "<td>" + clases[i].salon + "</td>" 
                + "<td>" + clases[i].horario + "</td>"
                +'<td class="text-right"><button class="btn btn-info btn-sm btn-icon"  type="button" onClick="mostrarModalEditar(\'' + clases[i].id + '\')"><span class="btn-inner--icon"><i class="fas fa-pencil-alt fa-2"></i></span></button>' 
                    +'<a rel="tooltip" class="btn btn-success btn-sm btn-icon"  type="button" href="clases/' + clases[i].id + '"><i class="fa fa-eye "></i></a>' 
                +'<button class="btn btn-danger btn-sm btn-icon"  type="button" onClick="Eliminar(\'' + clases[i].id + '\')"><span class="btn-inner--icon"><i class="fa fa-trash"></i></span></button></td>' 
                +  "</tr>";
        }

        $('#tabla-clases tbody').html(output);
    }
    function Eliminar(id){
        var r = confirm("Confirme la eliminación:");
        if(r){
            $.ajax({
                url: "{{route('clases.eliminar')}}",
                dataType: 'json',
                type:"delete",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "clase_id" : id
                },
            success: function (response) {   
                mostrarClases(response.data);       
                              
                }
            });
            return false;
        }
        
    }
</script>
@endpush