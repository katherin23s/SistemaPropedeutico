@extends('layouts.app', ['page' => __('Semestres'), 'pageSlug' => 'semestres'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">  
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Semestres</h4>
                        <div class="row">
                            <div class="col-md-2">   
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#AgregarModal" data-whatever="@mdo">Agregar</button>   
                            </div>   
                            <div class="col-md-10">
                                <!-- Search form -->
                                <form  method="post" action="{{ route('semestres.buscar') }}" >
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-10">
                                            <input name="buscar" class="form-control" type="text" placeholder="Buscar" aria-label="Search"> 
                                        </div>
                                        <div class="col-md-2">
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
                            <table class="table" id="tabla-semestres" >
                                <thead>
                                    <th scope="col">ID</th>
                                    <th scope="col">Número</th>
                                    <th scope="col">Periodo</th>
                                    <th scope="col">Fecha de inicio</th>
                                    <th scope="col">Fecha final</th>
                                    <th class="text-right" scope="col">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($semestres as $semestre)
                                        <tr>
                                            <td>{{ $semestre->id }}</td>
                                            <td>{{ $semestre->numero }}</td>
                                            <td>{{ $semestre->periodo() }}</td>
                                            <td>{{ $semestre->fecha_inicio->toDateString()}}</td>
                                            <td>{{ $semestre->fecha_final->toDateString() }}</td>
                                                                        
                                            </td>
                                            {{-- <td style="background: whitesmoke; border: Gray 2px solid;">
                                            <div style="text-align: center;">
                                                <i class="fas fa-pencil-alt fa-2 " style="font-size: 20px; color:orange"  data-placement="top" title="Editar" data-toggle="modal" data-target="#ModalEditar" data-whatever="@mdo"></i></i>
                                                <i class="fa fa-eye " aria-hidden="true" style="font-size: 20px; width: 30px; color:#048ab7" data-placement="top" title="Ver" data-toggle="modal" data-target="#ModalDepartamentos" data-whatever="@mdo"></i>
                                                <i class="fa fa-trash" aria-hidden="true" data-placement="top" title="Eliminar" style="font-size: 20px; color:red "></i>
                                            </div>
                                            </td> --}}
                                            <td class="td-actions text-right">
                                            <button class="btn btn-info btn-sm btn-icon" rel="tooltip"  type="button" onClick="mostrarModalEditar({{ $semestre->id }})">
                                                    <i class="fas fa-pencil-alt fa-2 "></i>
                                            </button>
                                            <a rel="tooltip" class="btn btn-success btn-sm btn-icon"  type="button" href=" {{ route('semestres.ver', $semestre) }} ">
                                                    <i class="fa fa-eye "></i> 
                                            </a>
                                            <button rel="tooltip" class="btn btn-danger btn-sm btn-icon"  type="button" onClick="Eliminar({{ $semestre->id }})">
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
                            {{ $semestres->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('Admin.Semestre.agregarModal')

@include('Admin.Semestre.editarModal')


@endsection
@push('js')
<script>
    function mostrarSemestres(data){
        var semestres = data;
        var output = "";

        for(var i = 0; i < semestres.length; i++){
            output += "<tr value="+semestres[i].id+">"
                + "<td>" + semestres[i].id + "</td>"
                + "<td>" + semestres[i].numero + "</td>" 
                + "<td>" + semestres[i].periodo + "</td>" 
                + "<td>" + semestres[i].fecha_inicio + "</td>" 
                + "<td>" + semestres[i].fecha_final + "</td>"
                +'<td class="text-right"><button class="btn btn-info btn-sm btn-icon"  type="button" onClick="mostrarModalEditar(\'' + semestres[i].id + '\')"><span class="btn-inner--icon"><i class="fas fa-pencil-alt fa-2"></i></span></button>' 
                +'<a rel="tooltip" class="btn btn-success btn-sm btn-icon"  type="button" href="' + semestres[i].id + '"><i class="fa fa-eye "></i></a>' 
                +'<button class="btn btn-danger btn-sm btn-icon"  type="button" onClick="Eliminar(\'' + semestres[i].id + '\')"><span class="btn-inner--icon"><i class="fa fa-trash"></i></span></button></td>' 
                +  "</tr>";
        }

        $('#tabla-semestres tbody').html(output);
    }
    function Eliminar(id){
        var r = confirm("Confirme la eliminación:");
        if(r){
            $.ajax({
                url: "{{route('semestres.eliminar')}}",
                dataType: 'json',
                type:"delete",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "semestre_id" : id
                },
            success: function (response) {          
                mostrarSemestres(response.data);            
                }
            });
            return false;
    }
    }
</script>
@endpush