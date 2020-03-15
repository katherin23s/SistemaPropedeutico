@extends('layouts.app', ['page' => __('departamento Management'), 'pageSlug' => 'departamentos'])
@section('content')
<div class="row col-12 center-block" style="left: 430px;">
<a class="navbar-brand " href="#" style="color: #0800ff;">DEPARTAMENTO</a>
</div>
    <div class="row">
            <div class="row" style="
            margin-left: 0px;
        ">
                <div class="col-8">
                    <h4 class="card-title">{{ __('Departamento') }}</h4>
                </div>

            </div>
   
            <div class="card col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height: 250px;">  
                <div class="card-body">
                    <div class="row col-12  ">
                    <div class="col-4 " style="padding-left: 0px;">   
                        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#AgregarModal" data-whatever="@mdo" style="background: #28CA00;">Agregar</button>   
                    </div>  
                        <div class="dropdown col-4">                   
                        <select class="btn btn mdb-select md-form " style="background:#28CA00 background-color: #28CA00;width: 188.4832px;background: #28CA00;padding-top: 9px;padding-bottom: 6px;margin-left: 0px;padding-left: 20px;padding-right: 30px;margin-top: ‒10;left: 20px; background-image: none;
                          background-image: linear-gradient(to bottom left, #28CA00, #28CA00, #28CA00) !important; left: 70px;">
                            <option value="" disabled selected style="background:#28CA00 ">departamento</option>
                            <option value="1" style="background:#28CA00 ">Option 1</option>
                            <option value="2" style="background:#28CA00 ">Option 2</option>
                            <option value="3" style="background:#28CA00 ">Option 3</option>
                          </select>
                          </div>

                          <div class="col-4">
                          <!-- Search form -->
                          <input class="form-control" type="text" placeholder="Search" aria-label="Search">   
                          </div>
                        </div>

                    @include('alerts.success')
                   
                    <div style=" position: absolute; top: 85px; left: 15px; width: 970px;   height:auto;">    
                        
                        <table class="table tablesorter col-lg-12 col-md-9 col-sm-8 col-xs-6" id="" >
                            <thead class=" text-primary" style="border: Gray 2px solid; background: #28CA00; ">
                                <th scope="col">{{ __('ID') }}</th>
                                <th scope="col">{{ __('Nombre') }}</th>
                                <th scope="col">{{ __('Plantel') }}</th>
                                <th scope="col">{{ __('Acciones') }}</th>
                            </thead>
                            <tbody style="background: whitesmoke; border: Gray 2px solid;">
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
                                          <button rel="tooltip" class="btn btn-success btn-sm btn-icon"  type="button" onClick="mostrarModalDepartamentos({{ $departamento->id }}, '{{ $departamento->nombre }}')">
                                                  <i class="fa fa-eye "></i>
                                          </button>
                                          <button rel="tooltip" class="btn btn-danger btn-sm btn-icon"  type="button" onClick="Eliminar({{ $departamento->id }})">
                                                  <i class="fas fa-edit"></i>
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



@include('Admin.Departamento.agregarModal', ['planteles' => $planteles])
@include('Admin.Departamento.editarModal')
@include('Admin.Departamento.verModal')
@endsection
@push('js')
<script>
    function Eliminar(id){
        $.ajax({
            url: "{{route('departamentos.eliminar')}}",
            dataType: 'json',
            type:"delete",
            data: {
                "_token": "{{ csrf_token() }}",
                "departamento_id" : id
            },
        success: function (data) {          
                          
            }
        });
            return false;
    }
</script>

@endpush
