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
                                <form  method="post" action="{{ route('clases.buscar') }}" >
                                    @csrf                                 
                                    <div class="form-row">
                                        <div class="col-md-2">
                                            <select id='carrera' class="custom-select" name="carrera"> 
                                                <option value='0'>Carrera</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select id='clase' class="custom-select" name="clase"> 
                                                <option value='0'>clase</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select id='semestre' class="custom-select" name="semestre"> 
                                                <option value='0'>Semestre</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-auto">
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
                            <table class="table" id="tabla-clases" >
                                <thead class=" text-primary" >
                                    <th scope="col">ID</th>
                                    <th scope="col">Materia</th>
                                    <th scope="col">Grupo</th>
                                    <th scope="col">Semestre</th>
                                    <th scope="col">Carrera</th>
                                    <th scope="col">Salon</th>
                                    <th scope="col">Horario</th>
                                </thead>
                                <tbody>
                                    @foreach ($clases as $clase)
                                        <tr>
                                            <td>{{ $clase->id }}</td>
                                            <td>{{ $clase->materia }}</td>
                                            <td>{{ $clase->grupo->nombre }}</td>
                                            <td>{{ $clase->grupo->semestre->numero }}</td>
                                            <td>{{ $clase->grupo->carrera->nombre }}</td>
                                            <td>{{ $clase->salon }}</td>
                                            <td>{{ $clase->horarioCompleto()}}</td>
                                            <td class="td-actions text-right">
                                            <button class="btn btn-info btn-sm btn-icon" rel="tooltip"  type="button" onClick="mostrarModalEditar({{ $clase->id }})">
                                                    <i class="fas fa-pencil-alt fa-2 "></i>
                                            </button>
                                            <a rel="tooltip" class="btn btn-success btn-sm btn-icon" type="button" href=" {{ route('clases.show', $clase) }} ">
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
                            {{ $clases->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('Admin.Clases.agregarModal')
@include('Admin.Clases.editarModal')
@include('Admin.Clases.verModal')
@endsection
@push('js')
<script>
    function mostrarClases(data){
        var clases = data;
        var output = "";

        for(var i = 0; i < clases.length; i++){
            output += "<tr value="+clases[i].id+">"
                + "<td>" + clases[i].id + "</td>"
                + "<td>" + clases[i].materia + "</td>" 
                + "<td>" + clases[i].grupo + "</td>" 
                + "<td>" + clases[i].semestre + "</td>" 
                + "<td>" + clases[i].carrera + "</td>" 
                + "<td>" + clases[i].salon + "</td>" 
                + "<td>" + clases[i].horario + "</td>"
                +'<td class="text-right"><button class="btn btn-info btn-sm btn-icon"  type="button" onClick="mostrarModalEditar(\'' + clases[i].id + '\')"><span class="btn-inner--icon"><i class="fas fa-pencil-alt fa-2"></i></span></button>' 
                +'<button class="btn btn-success btn-sm btn-icon"  type="button" onClick="mostrarModalclases(\'' + clases[i].id + '\',\'' + clases[i].numero + '\')"><span class="btn-inner--icon"><i class="fa fa-eye"></i></span></button>' 
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