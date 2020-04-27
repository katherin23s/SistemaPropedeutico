@extends('layouts.app', ['page' => __('Alumnos'), 'pageSlug' => 'Alumnos'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">  
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Alumnos</h4>
                        <div class="row">
                            <div class="col-md-1">   
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#AgregarModal" data-whatever="@mdo">Agregar</button>   
                            </div>  
                            <div class="col-md-11">
                                <!-- Search form -->
                                <form  method="get" action="{{ route('alumnos.index') }}" >
                                                                   
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
                                        <div class="col-md-3">
                                            <select id='grupo' class="custom-select" name="grupo"> 
                                                <option value='0'>Grupo</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-auto">
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
                            <table class="table" id="tabla-alumnos">
                                <thead class=" text-primary" >
                                <th scope="col">No. Alumno</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Grupo</th>
                                <th scope="col">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($alumnos as $alumno)
                                        <tr>
                                            <td>{{ $alumno->numero_alumno }}</td>
                                            <td>{{ $alumno->nombre }}</td>
                                            <td>{{ $alumno->direccion }}</td>
                                            <td>{{ $alumno->telefono }}</td>
                                            <td>
                                                <a href="mailto:{{ $alumno->email }}">{{ $alumno->email }}</a>
                                            </td>
                                            <td>{{ $alumno->grupo->numero }}</td>
                                            <td class="td-actions text-right">
                                                <button class="btn btn-info btn-sm btn-icon" rel="tooltip"  type="button" onClick="mostrarModalEditar({{ $alumno->id }})">
                                                        <i class="fas fa-pencil-alt fa-2 "></i>
                                                </button>
                                                <button rel="tooltip" class="btn btn-success btn-sm btn-icon"  type="button" onClick="mostrarModalalumnos({{ $alumno->id }}, '{{ $alumno->nombre }}')">
                                                        <i class="fa fa-eye "></i>
                                                </button>
                                                <button rel="tooltip" class="btn btn-danger btn-sm btn-icon"  type="button" onClick="Eliminar({{ $alumno->id }})">
                                                        <i class="fa fa-trash"></i>
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
                            {{ $alumnos->appends(['busqueda'=>$busqueda, 'cantidad'=>$cantidad])->links() }}
                        </nav>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@include('Admin.Alumnos.agregarModal')
@endsection
@push('js')
<script>
    function mostrarAlumnos(data){
        var alumnos = data;
        var output = "";

        for(var i = 0; i < alumnos.length; i++){
            output += "<tr value="+alumnos[i].id+">"
                + "<td>" + alumnos[i].numero_alumno + "</td>" 
                + "<td>" + alumnos[i].nombre + "</td>" 
                + "<td>" + alumnos[i].direccion + "</td>"
                + "<td>" + alumnos[i].telefono + "</td>"
                + "<td>" + alumnos[i].correo + "</td>"
                + "<td>" + alumnos[i].grupo + "</td>" 
                +'<td class="text-right"><button class="btn btn-info btn-sm btn-icon"  type="button" onClick="mostrarModalEditar(\'' + alumnos[i].id + '\')"><span class="btn-inner--icon"><i class="fas fa-pencil-alt fa-2"></i></span></button>' 
                +'<button class="btn btn-success btn-sm btn-icon"  type="button" onClick="mostrarModalalumnos(\'' + alumnos[i].id + '\',\'' + alumnos[i].nombre + '\')"><span class="btn-inner--icon"><i class="fa fa-eye"></i></span></button>' 
                +'<button class="btn btn-danger btn-sm btn-icon"  type="button" onClick="Eliminar(\'' + alumnos[i].id + '\')"><span class="btn-inner--icon"><i class="fa fa-trash"></i></span></button></td>' 
                +  "</tr>";
        }

        $('#tabla-alumnos tbody').html(output);
    }
    function Eliminar(id){
        var r = confirm("Confirme la eliminación:");
        if(r){
            $.ajax({
                url: "{{route('alumnos.eliminar')}}",
                dataType: 'json',
                type:"delete",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "alumno_id" : id
                },
            success: function (response) {   
                mostrarAlumnos(response.data);       
                              
                }
            });
            return false;
        }
        
    }
</script>
@endpush