@extends('layouts.app', ['page' => __('Materia Management'), 'pageSlug' => 'materias'])
@section('content')
<div class="row col-12 center-block" style="left: 430px;">
<a class="navbar-brand " href="#" style="color: #28CA00;">Materia</a>
</div>
    <div class="row">
            <div class="row" style="margin-left: 0px;">
                <div class="col-8">
                    <h4 class="card-title">{{ __('Materias') }}</h4>
                </div>
            </div>
            <div class="card">  
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 " style="padding-left: 0px;">   
                            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#AgregarModal" data-whatever="@mdo" style="background: #28CA00;">Agregar</button>   
                        </div>  
                        {{-- <div class="dropdown col-4">                   
                            <select class="btn btn mdb-select md-form " style="background:#28CA00 background-color: #28CA00;width: 188.4832px;background: #28CA00;padding-top: 9px;padding-bottom: 6px;margin-left: 0px;padding-left: 20px;padding-right: 30px;margin-top: ‒10;left: 20px; background-image: none;
                                background-image: linear-gradient(to bottom left, #28CA00, #28CA00, #28CA00) !important; left: 70px;">
                                <option value="" disabled selected style="background:#28CA00 ">Materia</option>
                                <option value="1" style="background:#28CA00 ">Option 1</option>
                                <option value="2" style="background:#28CA00 ">Option 2</option>
                                <option value="3" style="background:#28CA00 ">Option 3</option>
                            </select>
                        </div> --}}
                        <div class="col-lg-8">
                            <!-- Search form -->
                            <input class="form-control" type="text" placeholder="Search" aria-label="Search">   
                        </div>
                    </div>
                    @include('alerts.success')               
                    <div class="row">    
                        <div class="col-lg-12">
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
                                              <button rel="tooltip" class="btn btn-success btn-sm btn-icon"  type="button" onClick="mostrarModalMaterias({{ $materia->id }}, '{{ $materia->nombre }}')">
                                                      <i class="fa fa-eye "></i>
                                              </button>
                                              <button rel="tooltip" class="btn btn-danger btn-sm btn-icon"  type="button" onClick="Eliminar({{ $materia->id }})">
                                                      <i class="fa fa-trash"></i>
                                              </button>
                                          </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
                +'<button class="btn btn-success btn-sm btn-icon"  type="button" onClick="mostrarModalmaterias(\'' + materias[i].id + '\',\'' + materias[i].nombre + '\')"><span class="btn-inner--icon"><i class="fa fa-eye"></i></span></button>' 
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