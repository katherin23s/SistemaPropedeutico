@extends('layouts.app', ['page' => __('carrera Management'), 'pageSlug' => 'carreras'])
@section('content')
<div class="row col-12 center-block" style="left: 430px;">
<a class="navbar-brand " href="#" style="color: #28CA00;">Carrera</a>
</div>
<div class="row">
    <div class="row">
        <div class="col-8">
            <h4 class="card-title">{{ __('Carreras') }}</h4>
        </div>
    </div>
    <div class="card">  
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 " style="padding-left: 0px;">   
                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#AgregarModal" data-whatever="@mdo" style="background: #28CA00;">Agregar</button>   
                </div>  
                <div class="col-lg-8">
                    <!-- Search form -->
                    <input class="form-control" type="text" placeholder="Search" aria-label="Search">   
                </div>
            </div>
            @include('alerts.success')               
            <div class="row">    
                <div class="col-lg-12">
                    <table class="table" id="tabla-carreras">
                        <thead class=" text-primary" >
                            <th scope="col">{{ __('ID') }}</th>
                            <th scope="col">{{ __('Nombre') }}</th>
                            <th scope="col">{{ __('Serie') }}</th>
                            <th scope="col">{{ __('Departamento') }}</th>
                            <th scope="col">{{ __('Acciones') }}</th>
                        </thead>
                        <tbody>
                            @foreach ($carreras as $carrera)
                                <tr>
                                    <td>{{ $carrera->id }}</td>
                                    <td>{{ $carrera->nombre }}</td>
                                    <td>{{ $carrera->numero_serie }}</td>
                                    <td>{{ $carrera->departamento->nombre }}</td>
                                    <td class="td-actions text-right">
                                        <button class="btn btn-info btn-sm btn-icon" rel="tooltip"  type="button" onClick="mostrarModalEditar({{ $carrera->id }})">
                                                <i class="fas fa-pencil-alt fa-2 "></i>
                                        </button>
                                        <button rel="tooltip" class="btn btn-success btn-sm btn-icon"  type="button" onClick="mostrarModalcarreras({{ $carrera->id }}, '{{ $carrera->nombre }}')">
                                                <i class="fa fa-eye "></i>
                                        </button>
                                        <button rel="tooltip" class="btn btn-danger btn-sm btn-icon"  type="button" onClick="Eliminar({{ $carrera->id }})">
                                                <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $carreras->links() }}
                        </nav>
                    </div>
                </div>     
            </div>             
        </div>
        
    </div>
</div>
@include('Admin.Carrera.agregarModal')
@include('Admin.Carrera.editarModal')
@include('Admin.Carrera.verModal')
@endsection
@push('js')
<script>
    function mostrarCarreras(data){
        var carreras = data;
        var output = "";

        for(var i = 0; i < carreras.length; i++){
            output += "<tr value="+carreras[i].id+">"
                + "<td>" + carreras[i].id + "</td>"
                + "<td>" + carreras[i].nombre + "</td>" 
                + "<td>" + carreras[i].numero_serie + "</td>" 
                + "<td>" + carreras[i].departamento + "</td>" 
                +'<td class="text-right"><button class="btn btn-info btn-sm btn-icon"  type="button" onClick="mostrarModalEditar(\'' + carreras[i].id + '\')"><span class="btn-inner--icon"><i class="fas fa-pencil-alt fa-2"></i></span></button>' 
                +'<button class="btn btn-success btn-sm btn-icon"  type="button" onClick="mostrarModalcarreras(\'' + carreras[i].id + '\',\'' + carreras[i].nombre + '\')"><span class="btn-inner--icon"><i class="fa fa-eye"></i></span></button>' 
                +'<button class="btn btn-danger btn-sm btn-icon"  type="button" onClick="Eliminar(\'' + carreras[i].id + '\')"><span class="btn-inner--icon"><i class="fa fa-trash"></i></span></button></td>' 
                +  "</tr>";
        }

        $('#tabla-carreras tbody').html(output);
    }
    function Eliminar(id){
        var r = confirm("Confirme la eliminación:");
        if(r){
            $.ajax({
                url: "{{route('carreras.eliminar')}}",
                dataType: 'json',
                type:"delete",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "carrera_id" : id
                },
            success: function (response) {   
                mostrarCarreras(response.data);       
                              
                }
            });
            return false;
        }
        
    }
</script>
@endpush