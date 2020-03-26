@extends('layouts.app', ['page' => __('Grupos'), 'pageSlug' => 'grupos'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">  
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Grupos</h4>
                        <div class="row">
                            <div class="col-md-1">   
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#AgregarModal" data-whatever="@mdo">Agregar</button>   
                            </div>  
                            <div class="col-md-3">                   
                                <select>
                                    <option selected>Carrera</option>
                                    @foreach ($carreras as $carrera)
                                        <option value=" {{ $carrera->id }} ">{{ $carrera->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
            
                            <div class="col-md-8">
                                <!-- Search form -->
                                <input class="form-control" type="text" placeholder="Buscar" aria-label="Search">   
                            </div>
                        </div>
                    </div>
                
                    <div class="card-body">
                        @include('alerts.success')     
                        <div class="table-responsive">                           
                            <table class="table" id="tabla-grupos" >
                                <thead class=" text-primary" >
                                    <th scope="col">{{ __('ID') }}</th>
                                    <th scope="col">{{ __('Semestre') }}</th>
                                    <th scope="col">{{ __('Carrera') }}</th>
                                    <th scope="col">{{ __('Numero') }}</th>
                                    <th scope="col">{{ __('Hora inicio') }}</th>
                                    <th scope="col">{{ __('Hora final') }}</th>
                                </thead>
                                <tbody>
                                    @foreach ($grupos as $grupo)
                                        <tr>
                                            <td>{{ $grupo->id }}</td>
                                            <td>{{ $grupo->semestre->numero }}</td>
                                            <td>{{ $grupo->carrera->nombre }}</td>
                                            <td>{{ $grupo->numero }}</td>
                                            <td>{{ $grupo->hora_inicio->toTimeString()}}</td>
                                            <td>{{ $grupo->hora_final->toTimeString() }}</td>
                                            <td class="td-actions text-right">
                                            <button class="btn btn-info btn-sm btn-icon" rel="tooltip"  type="button" onClick="mostrarModalEditar({{ $grupo->id }})">
                                                    <i class="fas fa-pencil-alt fa-2 "></i>
                                            </button>
                                            <a rel="tooltip" class="btn btn-success btn-sm btn-icon" type="button" href=" {{ route('grupos.show', $grupo) }} ">
                                                    <i class="fa fa-eye "></i>
                                            </a>
                                            <button rel="tooltip" class="btn btn-danger btn-sm btn-icon"  type="button" onClick="Eliminar({{ $grupo->id }})">
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
                            {{ $grupos->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('Admin.Grupos.agregarModal')
@include('Admin.Grupos.editarModal')
@include('Admin.Grupos.verModal')
@endsection
@push('js')
<script>
    function mostrarGrupos(data){
        var grupos = data;
        var output = "";

        for(var i = 0; i < grupos.length; i++){
            output += "<tr value="+grupos[i].id+">"
                + "<td>" + grupos[i].id + "</td>"
                + "<td>" + grupos[i].semestre + "</td>" 
                + "<td>" + grupos[i].carrera + "</td>" 
                + "<td>" + grupos[i].numero + "</td>" 
                + "<td>" + grupos[i].hora_inicio + "</td>" 
                + "<td>" + grupos[i].hora_final + "</td>" 
                +'<td class="text-right"><button class="btn btn-info btn-sm btn-icon"  type="button" onClick="mostrarModalEditar(\'' + grupos[i].id + '\')"><span class="btn-inner--icon"><i class="fas fa-pencil-alt fa-2"></i></span></button>' 
                +'<button class="btn btn-success btn-sm btn-icon"  type="button" onClick="mostrarModalgrupos(\'' + grupos[i].id + '\',\'' + grupos[i].numero + '\')"><span class="btn-inner--icon"><i class="fa fa-eye"></i></span></button>' 
                +'<button class="btn btn-danger btn-sm btn-icon"  type="button" onClick="Eliminar(\'' + grupos[i].id + '\')"><span class="btn-inner--icon"><i class="fa fa-trash"></i></span></button></td>' 
                +  "</tr>";
        }

        $('#tabla-grupos tbody').html(output);
    }
    function Eliminar(id){
        var r = confirm("Confirme la eliminación:");
        if(r){
            $.ajax({
                url: "{{route('grupos.eliminar')}}",
                dataType: 'json',
                type:"delete",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "grupo_id" : id
                },
            success: function (response) {   
                mostrarGrupos(response.data);       
                              
                }
            });
            return false;
        }
        
    }
</script>
@endpush