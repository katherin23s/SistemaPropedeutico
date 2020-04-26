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
                            <div class="col-md-11">
                                <!-- Search form -->
                                <form method="get" action="{{ route('grupos.index') }}" >
                                                                   
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
                                            <select id='carrera' class="custom-select" name="carrera"> 
                                                <option value='0'>Carrera</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select id='semestre' class="custom-select" name="semestre"> 
                                                <option value='0'>Semestre</option>
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
                            <table class="table" id="tabla-grupos" >
                                <thead class="text-primary" >
                                    <th scope="col">ID</th>
                                    <th scope="col">Semestre</th>
                                    <th scope="col">Carrera</th>
                                    <th scope="col">Numero</th>
                                    <th scope="col">Hora inicio</th>
                                    <th scope="col">Hora final</th>
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
                                            <a rel="tooltip" class="btn btn-success btn-sm btn-icon" type="button" href=" {{ route('grupos.ver', $grupo) }} ">
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
                            {{ $grupos->appends(['busqueda'=>$busqueda, 'cantidad'=>$cantidad])->links() }}
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
                +'<a rel="tooltip" class="btn btn-success btn-sm btn-icon"  type="button" href="grupos/' + grupos[i].id + '"><i class="fa fa-eye "></i></a>' 
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