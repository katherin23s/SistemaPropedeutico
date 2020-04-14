@extends('layouts.app', ['page' => __('Departamentos'), 'pageSlug' => 'departamentos'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">  
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Departamentos</h4>
                        <div class="row">
                            <div class="col-md-2 col-auto">   
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#AgregarModal" data-whatever="@mdo">Agregar</button>   
                            </div>      
                            <div class="col-md-10">
                                <!-- Search form -->
                                <form  method="post" action="{{ route('departamentos.buscar') }}" >
                                    @csrf                                 
                                    <div class="form-row">
                                        <div class="col-md-2 col-auto">
                                            <select name="plantel_id">
                                                <option selected value="0">Plantel</option>
                                                @foreach ($planteles as $plantel)
                                                    <option value=" {{ $plantel->id }} ">{{ $plantel->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-8 col-auto">
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
                            <table class="table" id="tabla-departamentos">
                                <thead>
                                    <th scope="col">{{ __('ID') }}</th>
                                    <th scope="col">{{ __('Nombre') }}</th>
                                    <th scope="col">{{ __('Plantel') }}</th>
                                    <th scope="col">{{ __('Acciones') }}</th>
                                </thead>
                                <tbody>
                                    @foreach ($departamentos as $departamento)
                                        <tr>
                                            <td>{{ $departamento->id }}</td>
                                            <td>{{ $departamento->nombre }}</td>
                                            <td>{{ $departamento->plantel->nombre }}</td>
                                            {{-- <td style="background: whitesmoke; border: Gray 2px solid;">
                                                <div style="text-align: center;">
                                                <i class="fas fa-pencil-alt fa-2 " style="font-size: 20px; color:orange"  data-placement="top" title="Editar" data-toggle="modal" data-target="#ModalEditar" data-whatever="@mdo"></i></i>
                                                <i class="fa fa-eye " aria-hidden="true" style="font-size: 20px; width: 30px; color:#048ab7" data-placement="top" title="Ver" data-toggle="modal" data-target="#ModalDepartamentos" data-whatever="@mdo"></i>
                                                <i class="fa fa-trash" aria-hidden="true" data-placement="top" title="Eliminar" style="font-size: 20px; color:red "></i>
                                                </div>
                                            </td> --}}
                                            <td class="td-actions text-right">
                                                <button class="btn btn-info btn-sm btn-icon" rel="tooltip"  type="button" onClick="mostrarModalEditar({{ $departamento->id }})">
                                                        <i class="fas fa-pencil-alt fa-2 "></i>
                                                </button>
                                                <a rel="tooltip" class="btn btn-success btn-sm btn-icon"  type="button" href="{{ route('departamentos.ver', $departamento) }}">
                                                        <i class="fa fa-eye "></i>
                                                </a>
                                                <button rel="tooltip" class="btn btn-danger btn-sm btn-icon"  type="button" onClick="Eliminar({{ $departamento->id }})">
                                                        <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="card-footer py-4">
                                <nav class="d-flex justify-content-end" aria-label="...">
                                    {{ $departamentos->links() }}
                                </nav>
                            </div>
                        </div>              
                    </div>            
                </div>
            </div>
        </div>
    </div>
</div>

@include('Admin.Departamento.agregarModal', ['planteles' => $planteles])
@include('Admin.Departamento.editarModal')
@include('Admin.Departamento.verModal')
@endsection
@push('js')
<script>
    function mostrarDepartamentos(data){
        var departamentos = data;
        var output = "";

        for(var i = 0; i < departamentos.length; i++){
            output += "<tr value="+departamentos[i].id+">"
                + "<td>" + departamentos[i].id + "</td>"
                + "<td>" + departamentos[i].nombre + "</td>" 
                + "<td>" + departamentos[i].plantel + "</td>" 
                +'<td class="text-right"><button class="btn btn-info btn-sm btn-icon"  type="button" onClick="mostrarModalEditar(\'' + departamentos[i].id + '\')"><span class="btn-inner--icon"><i class="fas fa-pencil-alt fa-2"></i></span></button>' 
                +'<button class="btn btn-success btn-sm btn-icon"  type="button" onClick="mostrarModalDepartamentos(\'' + departamentos[i].id + '\',\'' + departamentos[i].nombre + '\')"><span class="btn-inner--icon"><i class="fa fa-eye"></i></span></button>' 
                +'<button class="btn btn-danger btn-sm btn-icon"  type="button" onClick="Eliminar(\'' + departamentos[i].id + '\')"><span class="btn-inner--icon"><i class="fa fa-trash"></i></span></button></td>' 
                +  "</tr>";
        }

        $('#tabla-departamentos tbody').html(output);
    }
 
    function Eliminar(id){
        var r = confirm("Confirme la eliminación:");
        if(r){
            $.ajax({
                url: "{{route('departamentos.eliminar')}}",
                dataType: 'json',
                type:"delete",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "departamento_id" : id
                },
            success: function (response) {     
                mostrarDepartamentos(response.data);                             
                }
            });
            return false;
        }
        else {

        }
        
    }
</script>

@endpush
