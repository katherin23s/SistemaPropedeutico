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
                                <form  method="post" action="{{ route('docentes.buscar') }}" >
                                    @csrf                                 
                                    <div class="form-row">
                                        <div class="col-md-3">
                                            <select id='departamento' class="custom-select" name="departamento"> 
                                                <option value='0'>Departamento</option>
                                            </select>
                                        </div>
                                        <div class="col-md-8">
                                            <input name="buscar" class="form-control" type="text" placeholder="Buscar" aria-label="Search"> 
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
                                <th scope="col">{{ __('No. Empleado') }}</th>
                                <th scope="col">{{ __('Nombre') }}</th>
                                <th scope="col">{{ __('Dirección') }}</th>
                                <th scope="col">{{ __('Teléfono') }}</th>
                                <th scope="col">{{ __('Correo') }}</th>
                                <th scope="col">{{ __('Departamento') }}</th>
                                <th scope="col">{{ __('Acciones') }}</th>
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
                                                <button class="btn btn-info btn-sm btn-icon" rel="tooltip"  type="button" onClick="mostrarModalEditar({{ $docente->id }})">
                                                        <i class="fas fa-pencil-alt fa-2 "></i>
                                                </button>
                                                <button rel="tooltip" class="btn btn-success btn-sm btn-icon"  type="button" onClick="mostrarModaldocentes({{ $docente->id }}, '{{ $docente->nombre }}')">
                                                        <i class="fa fa-eye "></i>
                                                </button>
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
                            {{ $docentes->links() }}
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
