@extends('layouts.app', ['page' => __('Semestre'), 'pageSlug' => 'Semestre'])
@section('content')
<div class="row col-12 center-block" style="left: 430px;">
  <a class="navbar-brand " href="#">Semestres</a>
</div>
<div class="row">
        <div class="row" style="
        margin-left: 0px;">
            <div class="col-8">
                <h4 class="card-title">{{ __('Semestres') }}</h4>
            </div>

        </div>

        <div class="card col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height: 250px;">  
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 ">   
                        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#AgregarModal" data-whatever="@mdo">Agregar</button>   
                    </div>  
                    {{-- <div class="dropdown col-4">                   
                        <select class="btn btn mdb-select md-form " style="background:#28CA00 background-color: #28CA00;width: 188.4832px;background: #28CA00;padding-top: 9px;padding-bottom: 6px;margin-left: 0px;padding-left: 20px;padding-right: 30px;margin-top: ‒10;left: 20px; background-image: none;
                            background-image: linear-gradient(to bottom left, #ba55d3, #ba55d3, #ba55d3) !important; left: 70px;">
                            <option value="" disabled selected style="background:#28CA00 ">Plantel</option>
                            <option value="1" style="background:#28CA00 ">Option 1</option>
                            <option value="2" style="background:#28CA00 ">Option 2</option>
                            <option value="3" style="background:#28CA00 ">Option 3</option>
                        </select>
                    </div> --}}

                    <div class="col-md-8">
                        <!-- Search form -->
                        <input class="form-control" type="text" placeholder="Search" aria-label="Search">   
                    </div>
                </div>

                @include('alerts.success')
                
                <table class="table" id="tabla-semestres" >
                    <thead>
                        <th scope="col">{{ __('ID') }}</th>
                        <th scope="col">{{ __('Numero') }}</th>
                        <th scope="col">{{ __('Fecha de inicio') }}</th>
                        <th scope="col">{{ __('Fecha final') }}</th>
                        <th class="text-right" scope="col">{{ __('Acciones') }}</th>
                    </thead>
                    <tbody>
                          @foreach ($semestres as $semestre)
                            <tr>
                                <td>{{ $semestre->id }}</td>
                                <td>{{ $semestre->numero }}</td>
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
                                  <button rel="tooltip" class="btn btn-success btn-sm btn-icon"  type="button" onClick="mostrarModalDepartamentos({{ $semestre->id }}, '{{ $semestre->numero }}')">
                                          <i class="fa fa-eye "></i>
                                  </button>
                                  <button rel="tooltip" class="btn btn-danger btn-sm btn-icon"  type="button" onClick="Eliminar({{ $semestre->id }})">
                                          <i class="fas fa-trash"></i>
                                  </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                
            </div>
            <div class="card-footer py-4">
                <nav class="d-flex justify-content-end" aria-label="...">
                    {{ $semestres->links() }}
                </nav>
            </div>
        </div>

</div>

@include('Admin.Semestre.agregarModal')

@include('Admin.Semestre.editarModal')

@include('Admin.Semestre.verModal')

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
                + "<td>" + semestres[i].fecha_inicio + "</td>" 
                + "<td>" + semestres[i].fecha_final + "</td>"
                +'<td class="text-right"><button class="btn btn-info btn-sm btn-icon"  type="button" onClick="mostrarModalEditar(\'' + semestres[i].id + '\')"><span class="btn-inner--icon"><i class="fas fa-pencil-alt fa-2"></i></span></button>' 
                +'<button class="btn btn-success btn-sm btn-icon"  type="button" onClick="mostrarModalDepartamentos(\'' + semestres[i].id + '\',\'' + semestres[i].numero + '\')"><span class="btn-inner--icon"><i class="fa fa-eye"></i></span></button>' 
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