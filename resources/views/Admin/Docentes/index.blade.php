@extends('layouts.app', ['page' => __('Docentes'), 'pageSlug' => 'docentes'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">  
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Docentes</h4>
                        <div class="row">
                            <div class="col-md-1">   
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#AgregarModal" data-whatever="@mdo">Agregar</button>   
                            </div>  
                            <div class="col-md-11">
                                <!-- Search form -->
                                <form  method="get" action="{{ route('docentes.index') }}" >
                                                                   
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
                                            <select id='departamento' class="custom-select" name="departamento"> 
                                                <option value='0'>Departamento</option>
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
                            <table class="table" id="tabla-docentes">
                                <thead class=" text-primary" >
                                <th scope="col">No. Empleado</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Departamento</th>
                                <th scope="col">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($docentes as $docente)
                                        <tr>
                                            <td>{{ $docente->numero_empleado }}</td>
                                            <td>{{ $docente->nombre }}</td>
                                            <td>{{ $docente->direccion }}</td>
                                            <td>{{ $docente->telefono }}</td>
                                            <td>
                                                <a href="mailto:{{ $docente->email }}">{{ $docente->email }}</a>
                                            </td>
                                            <td>{{ $docente->departamento->nombre }}</td>
                                            <td class="td-actions text-right">
                                                <a class="btn btn-info btn-sm btn-icon" rel="tooltip"  type="button" href="{{ route('docentes.actualizar', $docente) }} ">
                                                    <i class="fas fa-pencil-alt fa-2 "></i>
                                                </a>
                                                <a rel="tooltip" class="btn btn-success btn-sm btn-icon" type="button" href="{{ route('docentes.ver', $docente) }} ">
                                                        <i class="fa fa-eye "></i>
                                                </a>
                                                <button rel="tooltip" class="btn btn-danger btn-sm btn-icon"  type="button" onClick="Eliminar({{ $docente->id }})">
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
                            {{ $docentes->appends(['busqueda'=>$busqueda, 'cantidad'=>$cantidad])->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('Admin.Docentes.agregarModal')
@endsection

@push('js')
<script>
    function mostrarDocentes(data){
        var docentes = data;
        var output = "";

        for(var i = 0; i < docentes.length; i++){
            output += "<tr value="+docentes[i].id+">"
                + "<td>" + docentes[i].numero_empleado + "</td>" 
                + "<td>" + docentes[i].nombre + "</td>" 
                + "<td>" + docentes[i].direccion + "</td>"
                + "<td>" + docentes[i].telefono + "</td>"
                + "<td>" + docentes[i].email + "</td>"
                + "<td>" + docentes[i].departamento + "</td>" 
                +'<td class="text-right"><button class="btn btn-info btn-sm btn-icon"  type="button" onClick="mostrarModalEditar(\'' + docentes[i].id + '\')"><span class="btn-inner--icon"><i class="fas fa-pencil-alt fa-2"></i></span></button>' 
                +'<button class="btn btn-success btn-sm btn-icon"  type="button" onClick="mostrarModaldocentes(\'' + docentes[i].id + '\',\'' + docentes[i].nombre + '\')"><span class="btn-inner--icon"><i class="fa fa-eye"></i></span></button>' 
                +'<button class="btn btn-danger btn-sm btn-icon"  type="button" onClick="Eliminar(\'' + docentes[i].id + '\')"><span class="btn-inner--icon"><i class="fa fa-trash"></i></span></button></td>' 
                +  "</tr>";
        }

        $('#tabla-docentes tbody').html(output);
    }
    function Eliminar(id){
        var r = confirm("Confirme la eliminación:");
        if(r){
            $.ajax({
                url: "{{route('docentes.eliminar')}}",
                dataType: 'json',
                type:"delete",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "docente_id" : id
                },
            success: function (response) {   
                mostrarDocentes(response.data);       
                              
                }
            });
            return false;
        }
        
    }
</script>
@endpush
