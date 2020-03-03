@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users'])
@section('content')
<div class="row col-12 center-block" style="left: 430px;">
<a class="navbar-brand " href="#"  style="color: #28CA00;">GRUPO</a>
</div>
    <div class="row">
            <div class="row" style="
            margin-left: 0px;
        ">
                <div class="col-8">
                    <h4 class="card-title">{{ __('Grupo') }}</h4>
                </div>

            </div>
   
            <div class="card col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height: 250px;">  
                <div class="card-body">
                    <div class="row col-12  ">
                    <div class="col-4 " style="padding-left: 0px;">   
                      <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="background: #28CA00;">Agregar</button>   
                    </div>  
                          <div class="col-4" style="left: 320px;">
                          <!-- Search form -->
                          <input class="form-control" type="text" placeholder="Search" aria-label="Search">   
                          </div>
                        </div>

                    @include('alerts.success')
                   
                    <div style=" position: absolute; top: 85px; left: 15px; width: 970px;   height:auto;">    
                        
                        <table class="table tablesorter col-lg-12 col-md-9 col-sm-8 col-xs-6" id="" >
                            <thead class=" text-primary" style="border: Gray 2px solid; background: #28CA00; ">
                                <th scope="col">{{ __('ID') }}</th>
                                <th scope="col">{{ __('Grupo') }}</th>
                                <th scope="col">{{ __('Unidad') }}</th>
                                <th scope="col">{{ __('Departamento') }}</th>
                                <th scope="col">{{ __('Carrera') }}</th>
                                <th scope="col">{{ __('Acciones') }}</th>
                            </thead>
                            <tbody style="background: whitesmoke; border: Gray 2px solid;">
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                        </td>
                                        <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-right">       
                                        </td>
                                        <td class="text-right">       
                                        </td>

                                        <td style="background: whitesmoke; border: Gray 2px solid;">
                                        <div style="text-align: center;">
                                        <i class="fas fa-pencil-alt fa-2 " style="font-size: 20px; color:orange"  data-placement="top" title="Editar" data-toggle="modal" data-target="#ModalEditar" data-whatever="@mdo"></i></i>
                                        <i class="fa fa-eye " aria-hidden="true" style="font-size: 20px; width: 30px; color:#048ab7" data-placement="top" title="Ver" data-toggle="modal" data-target="#ModalDepartamentos" data-whatever="@mdo"></i>
                                        <i class="fa fa-trash" aria-hidden="true" data-placement="top" title="Eliminar" style="font-size: 20px; color:red "></i>
                                        </div>
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
                    
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $users->links() }}
                    </nav>
                </div>
            </div>

    </div>

    <!-- MODAL AGREGAR CARRERA -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5  align="center" class="modal-title" id="exampleModalLabel">GRUPO</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="padding-bottom: 60px; padding-top: 30px;">
              <form>
                <div class="row form-group col-auto col-12" style="height: 25px;">
                  <label for="recipient-name" class="col-form-label col-6 "style="padding-left: 0px ">ID</label>
                  <label for="recipient-name" class="col-form-label col-6" style="padding-left: 25px">Grupo</label>
                </div>
                <div class="row col-12">
                  <input type="text" class=" col-6 form-control" id="recipient-name">
                  <input type="text" class="col-6 form-control" id="recipient-name" style="left: 25px;">
                </div>
            

                <div class="row col-12">
                  <select class="col-6 custom-select" id="inputGroupSelect04" style="color:#525f7f; top: 30px; ">
                    <option selected>Unidad</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                  <select class="col-6 custom-select" id="inputGroupSelect04" style="color:#525f7f; top: 30px; left: 25px;">
                    <option selected>Departamento</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>


                <div class="row col-12" style="top: 30px;">
                    <select class="col-12 custom-select" id="inputGroupSelect04" style="color:#525f7f; top: 30px;">
                      <option selected>Carrera</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                    
                  </div>

              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary " style="left: 355px;" >Guardar</button>
            </div>
          </div>
        </div>
      </div>

      <!--MODAL EDITAR -->
      <div class="modal fade" id="ModalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5  align="center" class="modal-title" id="exampleModalLabel">EDITAR GRUPO</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="padding-bottom: 60px; padding-top: 30px;">
              <form>
                <div class="row form-group col-auto col-12" style="height: 25px;">
                    <label for="recipient-name" class="col-form-label col-6 "style="padding-left: 0px ">ID</label>
                    <label for="recipient-name" class="col-form-label col-6" style="padding-left: 25px">Grupo</label>
                  </div>
                  <div class="row col-12">
                    <input type="text" class=" col-6 form-control" id="recipient-name">
                    <input type="text" class="col-6 form-control" id="recipient-name" style="left: 25px;">
                  </div>
              
  
                  <div class="row col-12">
                    <select class="col-6 custom-select" id="inputGroupSelect04" style="color:#525f7f; top: 30px; ">
                      <option selected>Unidad</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                    <select class="col-6 custom-select" id="inputGroupSelect04" style="color:#525f7f; top: 30px; left: 25px;">
                      <option selected>Departamento</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
  
  
                  <div class="row col-12" style="top: 30px;">
                      <select class="col-12 custom-select" id="inputGroupSelect04" style="color:#525f7f; top: 30px;">
                        <option selected>Carrera</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                      
                    </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary " style="left: 355px; top: 10px;" >Guardar</button>
            </div>
          </div>
        </div>
      </div>

      <!--MODAL VER DEPARTAMENTOS DE LAS CARRERAS -->
      <div class="modal fade" id="ModalDepartamentos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5  align="center" class="modal-title" id="exampleModalLabel">PLANTEL</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="padding-bottom: 60px; padding-top: 30px;">
              <form>
                <div class="row form-group col-auto col-12" style="height: 25px;">
                  <label for="recipient-name" class="col-form-label col-6 "style="padding-left: 0px ">Unidad: Otay</label>
                </div>
                <table class="table tablesorter col-lg-12 col-md-9 col-sm-8 col-xs-6" id="" >
                    <thead class=" text-primary" style="border: Gray 2px solid; background: #28CA00; ">
                        <th scope="col">{{ __('ID') }}</th>
                        <th scope="col">{{ __('Departamento') }}</th>
                    </thead>
                    <tbody style="background: whitesmoke; border: Gray 2px solid;">
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>
                                    <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                </td>           
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary " style="left: 355px;" >Guardar</button>
            </div>
          </div>
        </div>
      </div>

@endsection