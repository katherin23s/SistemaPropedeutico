@extends('layouts.app', ['page' => __('Materias'), 'pageSlug' => 'materias'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Materias</h4>
                        <div class="row">
                            <div class="col-md-1">   
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#AgregarModal" data-whatever="@mdo">Agregar</button>   
                            </div>      
                            <div class="col-md-11">
                                <!-- Search form -->
                                <form  method="post" action="{{ route('materias.buscar') }}" >
                                    @csrf                                 
                                    <div class="form-row">
                                        <div class="col-md-3">
                                            <select id='carrera' class="custom-select" name="carrera"> 
                                                <option value='0'>Carrera</option>
                                            </select>
                                        </div>
                                        <div class="col-md-8 col-auto">
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
                            <table class="table" id="tabla-materias">
                                <thead class=" text-primary" >
                                    <th scope="col">{{ __('ID') }}</th>
                                    <th scope="col">{{ __('Nombre') }}</th>
                                    <th scope="col">{{ __('Clave') }}</th>
                                    <th scope="col">{{ __('Creditos') }}</th>
                                    <th scope="col">{{ __('Unidades') }}</th>
                                    <th scope="col">{{ __('Carrera') }}</th>
                                    <th scope="col">{{ __('Acciones') }}</th>
                                </thead>
                                <tbody>
                                    @foreach ($materias as $materia)
                                        <tr>
                                        <td>{{ $materia->id }}</td>
                                        <td>{{ $materia->nombre }}</td>
                                        <td>{{ $materia->clave }}</td>
                                        <td>{{ $materia->creditos }}</td>
                                        <td>{{ $materia->unidades }}</td>
                                        <td>{{ $materia->carrera->nombre }}</td>
                                        <td class="td-actions text-right">
                                            <button class="btn btn-info btn-sm btn-icon" rel="tooltip"  type="button" onClick="mostrarModalEditar({{ $materia->id }})"> 
                                                    <i class="fas fa-pencil-alt fa-2 "></i>
                                            </button>
                                            <a rel="tooltip" class="btn btn-success btn-sm btn-icon"  type="button" href=" {{ route('materias.ver', $materia) }} ">
                                                    <i class="fa fa-eye "></i> 
                                            </a>
                                            <button rel="tooltip" class="btn btn-danger btn-sm btn-icon"  type="button" onClick="Eliminar({{ $materia->id }})">
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
                            {{ $materias->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('Admin.Materias.agregarModal')
@include('Admin.Materias.editarModal')
{{-- @include('Admin.Materias.verModal') --}}
@endsection
@push('js')
<script>
    function mostrarMaterias(data){
        var materias = data;
        var output = "";

        for(var i = 0; i < materias.length; i++){
            output += "<tr value="+materias[i].id+">"
                + "<td>" + materias[i].id + "</td>"
                + "<td>" + materias[i].nombre + "</td>" 
                + "<td>" + materias[i].clave + "</td>"
                + "<td>" + materias[i].creditos + "</td>" 
                + "<td>" + materias[i].unidades + "</td>" 
                + "<td>" + materias[i].carrera + "</td>" 
                +'<td class="text-right"><button class="btn btn-info btn-sm btn-icon"  type="button" onClick="mostrarModalEditar(\'' + materias[i].id + '\')"><span class="btn-inner--icon"><i class="fas fa-pencil-alt fa-2"></i></span></button>' 
                +'<a rel="tooltip" class="btn btn-success btn-sm btn-icon"  type="button" href="materias/' + materias[i].id + '"><i class="fa fa-eye "></i></a>' 
                +'<button class="btn btn-danger btn-sm btn-icon"  type="button" onClick="Eliminar(\'' + materias[i].id + '\')"><span class="btn-inner--icon"><i class="fa fa-trash"></i></span></button></td>' 
                +  "</tr>";
        }

        $('#tabla-materias tbody').html(output);
    }
    function Eliminar(id){
        var r = confirm("Confirme la eliminación:");
        if(r){
            $.ajax({
                url: "{{route('materias.eliminar')}}",
                dataType: 'json',
                type:"delete",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "materia_id" : id
                },
            success: function (response) {   
                mostrarMaterias(response.data);       
                              
                }
            });
            return false;
        }
        
    }
</script>
@endpush