@extends('layouts.app', ['page' => __('Carreras'), 'pageSlug' => 'carreras'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">  
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Carreras</h4>
                        <div class="row">
                            <div class="col-md-1">   
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#AgregarModal" data-whatever="@mdo">Agregar</button>   
                            </div>  
         
                            <div class="col-md-11">
                                <!-- Search form -->
                                <form  method="post" action="{{ route('carreras.buscar') }}" >
                                    @csrf                                 
                                    <div class="form-row">
                                        <div class="col-md-3">
                                            <select id='departamento' class="custom-select" name="departamento"> 
                                                <option value='0'>Departamento</option>
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
                                                <button class="btn btn-info btn-sm btn-icon" rel="tooltip" type="button" onClick="mostrarModalEditar({{ $carrera->id }})">
                                                        <i class="fas fa-pencil-alt fa-2 "></i>
                                                </button>
                                                <a rel="tooltip" class="btn btn-success btn-sm btn-icon" type="button" href="{{ route('carreras.ver', $carrera) }}">
                                                        <i class="fa fa-eye "></i>
                                                </a>
                                                <button rel="tooltip" class="btn btn-danger btn-sm btn-icon" type="button" onClick="Eliminar({{ $carrera->id }})">
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
                +'<a rel="tooltip" class="btn btn-success btn-sm btn-icon"  type="button" href="carreras/' + carreras[i].id + '"><i class="fa fa-eye "></i></a>' 
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