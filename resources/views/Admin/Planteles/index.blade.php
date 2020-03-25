@extends('layouts.app', ['page' => __('Planteles'), 'pageSlug' => 'planteles'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">  
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Planteles</h4>
                        <div class="row">
                            <div class="col-3">   
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#AgregarModal" data-whatever="@mdo">Agregar</button>   
                            </div>  
                            <div class="col-9">
                                <!-- Search form -->
                                <input class="form-control" type="text" placeholder="Buscar" aria-label="Search">   
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        
            
                        @include('alerts.success')
                        
                        <div class="table-responsive">
                            <table class="table" id="tabla-planteles" >
                                <thead>
                                    <th scope="col">{{ __('ID') }}</th>
                                    <th scope="col">{{ __('Nombre') }}</th>
                                    <th scope="col">{{ __('Direccion') }}</th>
                                    <th scope="col">{{ __('Telefono') }}</th>
                                    <th scope="col">{{ __('Correo') }}</th>
                                    <th class="text-right" scope="col">{{ __('Acciones') }}</th>
                                </thead>
                                <tbody>
                                    @foreach ($planteles as $plantel)
                                        <tr>
                                            <td>{{ $plantel->id }}</td>
                                            <td>{{ $plantel->nombre }}</td>
                                            <td>{{ $plantel->direccion }}</td>
                                            <td>{{ $plantel->telefono }}</td>
                                            <td>
                                                <a href="mailto:{{ $plantel->correo }}">{{ $plantel->correo }}</a>
                                            </td>
                                            {{-- <td style="background: whitesmoke; border: Gray 2px solid;">
                                                <div style="text-align: center;">
                                                <i class="fas fa-pencil-alt fa-2 " style="font-size: 20px; color:orange"  data-placement="top" title="Editar" data-toggle="modal" data-target="#ModalEditar" data-whatever="@mdo"></i></i>
                                                <i class="fa fa-eye " aria-hidden="true" style="font-size: 20px; width: 30px; color:#048ab7" data-placement="top" title="Ver" data-toggle="modal" data-target="#ModalDepartamentos" data-whatever="@mdo"></i>
                                                <i class="fa fa-trash" aria-hidden="true" data-placement="top" title="Eliminar" style="font-size: 20px; color:red "></i>
                                                </div>
                                            </td> --}}
                                            <td class="td-actions text-right">
                                                <button class="btn btn-info btn-sm btn-icon" rel="tooltip"  type="button" onClick="mostrarModalEditar({{ $plantel->id }})">
                                                        <i class="fas fa-pencil-alt fa-2 "></i>
                                                </button>
                                                <button rel="tooltip" class="btn btn-success btn-sm btn-icon"  type="button" onClick="mostrarModalDepartamentos({{ $plantel->id }}, '{{ $plantel->nombre }}')">
                                                        <i class="fa fa-eye "></i>
                                                </button>
                                                <button rel="tooltip" class="btn btn-danger btn-sm btn-icon"  type="button" onClick="Eliminar({{ $plantel->id }})">
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
                            
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('Admin.Planteles.agregarModal')

@include('Admin.Planteles.editarModal')

@include('Admin.Planteles.verModal')

@endsection

@push('js')
<script>
    function mostrarPlanteles(data){
        var planteles = data;
        var output = "";

        for(var i = 0; i < planteles.length; i++){
            output += "<tr value="+planteles[i].id+">"
                + "<td>" + planteles[i].id + "</td>"
                + "<td>" + planteles[i].nombre + "</td>" 
                + "<td>" + planteles[i].direccion + "</td>" 
                + "<td>" + planteles[i].telefono+ "</td>"
                +"<td><a href="+"mailto:"+planteles[i].correo+">" + planteles[i].correo+ "</a></td>"
                +'<td class="text-right"><button class="btn btn-info btn-sm btn-icon"  type="button" onClick="mostrarModalEditar(\'' + planteles[i].id + '\')"><span class="btn-inner--icon"><i class="fas fa-pencil-alt fa-2"></i></span></button>' 
                +'<button class="btn btn-success btn-sm btn-icon"  type="button" onClick="mostrarModalDepartamentos(\'' + planteles[i].id + '\',\'' + planteles[i].nombre + '\')"><span class="btn-inner--icon"><i class="fa fa-eye"></i></span></button>' 
                +'<button class="btn btn-danger btn-sm btn-icon"  type="button" onClick="Eliminar(\'' + planteles[i].id + '\')"><span class="btn-inner--icon"><i class="fa fa-trash"></i></span></button></td>' 
                +  "</tr>";
        }

        $('#tabla-planteles tbody').html(output);
    }
    function Eliminar(id){
        var r = confirm("Confirme la eliminación:");
        if(r){
            $.ajax({
                url: "{{route('planteles.eliminar')}}",
                dataType: 'json',
                type:"delete",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "plantel_id" : id
                },
            success: function (response) {          
                mostrarPlanteles(response.data);            
                }
            });
            return false;
    }
    }
</script>
@endpush
