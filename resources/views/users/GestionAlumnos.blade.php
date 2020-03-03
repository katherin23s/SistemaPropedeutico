@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users'])

@section('content')
    <div class="row">
      
            <div class="row" style="
            margin-left: 0px;">
                <div class="col-12">
                    <h4 class="card-title">{{ __('Gestion de Estudiantes') }}</h4>
                </div>

            </div>
   
            <div class="card col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height: 250px;">  
                <div class="card-body">
                    <div class="row col-12  ">
                    <div class="col-3 " style="padding-left: 0px;">   
                         <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="background: ##28CA00;">Agregar</button>   
                    </div>  
                        <div class="dropdown col-3">
                           
                        <select class="btn btn mdb-select md-form " style="background:##28CA00 background-color: ##28CA00;width: 188.4832px;background: ##28CA00;padding-top: 9px;padding-bottom: 6px;margin-left: 0px;padding-left: 20px;padding-right: 30px;margin-top: ‒10;left: 20px; background-image: none;
                          background-image: linear-gradient(to bottom left, ##28CA00, ##28CA00, ##28CA00) !important; left: 70px;">
                            <option value="" disabled selected style="background:##28CA00 ">Plantel</option>
                            <option value="1" style="background:##28CA00 ">Option 1</option>
                            <option value="2" style="background:##28CA00 ">Option 2</option>
                            <option value="3" style="background:##28CA00 ">Option 3</option>
                          </select>
                          </div>
    
                          <div class="dropdown col-3 ">
                            <select class="btn btn mdb-select md-form " style="background:##28CA00 background-color: ##28CA00;width: 188.4832px;background: ##28CA00;padding-top: 9px;padding-bottom: 6px;margin-left: 0px;padding-left: 20px;margin-top: ‒10;left: 20px; background-image: none;
                                background-image: linear-gradient(to bottom left, ##28CA00, ##28CA00, ##28CA00) !important; ">
                                <option value="" disabled selected  style="background:##28CA00 ">Departamento</option>
                                <option value="1" style="background:##28CA00">Option 1</option>
                                <option value="2" style="background:##28CA00">Option 2</option>
                                <option value="3" style="background:##28CA00">Option 3</option>
                              </select>
           
                          </div>

                          <div class="dropdown col-3 " style="
                          padding-left: 0px;
                          right: 30px;
                      ">
                            <select class="btn btn mdb-select md-form " style="background:##28CA00 background-color: ##28CA00;width: 188.4832px;background: ##28CA00;padding-top: 9px;padding-bottom: 6px;margin-left: 0px;padding-left: 20px;margin-top: ‒10;left: 20px; background-image: none;
                                background-image: linear-gradient(to bottom left, ##28CA00, ##28CA00, ##28CA00) !important; ">
                                <option value="" disabled selected  style="background:##28CA00 ">Carrera</option>
                                <option value="1" style="background:##28CA00">Option 1</option>
                                <option value="2" style="background:##28CA00">Option 2</option>
                                <option value="3" style="background:##28CA00">Option 3</option>
                              </select>
           
                          </div>
                    <div class="row col-12  ">
                          <div class="col-12" style="
                          padding-left: 0px;
                          padding-right: 0px;
                          margin-right: ‒10;
                          width: 940px;
                      ">
                          <!-- Search form -->
                          <input class="form-control" type="text" placeholder="Search" aria-label="Search" style="
                          width: 974.4px;
                      ">   
                          </div>
                        </div>
                        </div>

                    @include('alerts.success')
                   
                    <div style="position: absolute;top: 120px;left: 15px;width: 970px;height:auto;">    
                        
                        <table class="table tablesorter col-lg-12 col-md-9 col-sm-8 col-xs-6" id="" style="
                        left: 20px;
                    " >
                            <thead class=" text-primary" style="border: Gray 2px solid; background: ##28CA00; ">
                                <th scope="col">{{ __('Matricula') }}</th>
                                <th scope="col">{{ __('Nombre') }}</th>
                                <th scope="col">{{ __('Domicilio') }}</th>
                                <th scope="col">{{ __('Telefono') }}</th>
                                <th scope="col">{{ __('Correo') }}</th>
                                <th scope="col">{{ __('Plantel') }}</th>
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
                                        <td class="text-right">       
                                        </td>
                                        <td class="text-right">       
                                        </td>
                                        <td class="text-right">       
                                        </td>
                                        <td style="background: whitesmoke; border: Gray 2px solid;">
                                        <div style="text-align: center;">
                                        <i class="fas fa-pencil-alt fa-2 " style="font-size: 20px; color:orange"  data-placement="top" title="Editar" data-toggle="modal" data-target="#ModalEditar" data-whatever="@mdo"></i></i>
                                        <i class="fa fa-address-book" aria-hidden="true" data-placement="top" title="Documentos" style="font-size: 20px; color:black " data-toggle="modal" data-target="#ModalPDF1" data-whatever="@mdo"></i>                          
                                        <i class="fa fa-list-ol" aria-hidden="true" data-placement="top" title="Calificaciones" style="font-size: 20px; color:green " data-toggle="modal" data-target="#ModalCalificaciones" data-whatever="@mdo"></i>
                                        <i class="fa fa-graduation-cap" aria-hidden="true" data-placement="top" title="Inscripciones" style="font-size: 20px; color:purple " data-toggle="modal" data-target="#ModalInscripciones" data-whatever="@mdo"></i>
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
              <h5  align="center" class="modal-title" id="exampleModalLabel">NUEVA CARRERA</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="padding-bottom: 60px; padding-top: 30px;">
              <form>
                <div class="row form-group col-auto col-12" style="height: 25px;">
                  <label for="recipient-name" class="col-form-label col-6 "style="padding-left: 0px ">No.Serie</label>
                  <label for="recipient-name" class="col-form-label col-6" style="padding-left: 25px">Nombre</label>
                </div>
                <div class="row col-12">
                  <input type="text" class=" col-6 form-control" id="recipient-name">
                  <input type="text" class="col-6 form-control" id="recipient-name" style="left: 25px;">
                </div>
                <div class="row col-12" style="top: 20px;">
              
                    <select class="col-6 custom-select" id="inputGroupSelect04" style="color:#525f7f;">
                      <option selected>Plantel</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>

                    <select class="col-6 custom-select" id="inputGroupSelect04" style="color:#525f7f; left: 25px;">
                        <option selected>Departamento</option>
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
              <h5  align="center" class="modal-title" id="exampleModalLabel">EDITAR CARRERA</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="padding-bottom: 60px; padding-top: 30px;">
              <form>
                <div class="row form-group col-auto col-12" style="height: 25px;">
                  <label for="recipient-name" class="col-form-label col-6 "style="padding-left: 0px ">No.Serie</label>
                  <label for="recipient-name" class="col-form-label col-6" style="padding-left: 25px">Nombre</label>
                </div>
                <div class="row col-12">
                  <input type="text" class=" col-6 form-control" id="recipient-name">
                  <input type="text" class="col-6 form-control" id="recipient-name" style="left: 25px;">
                </div>
                <div class="row col-12" style="top: 20px;">
              
                    <select class="col-6 custom-select" id="inputGroupSelect04" style="color:#525f7f;">
                      <option selected>Plantel</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>

                    <select class="col-6 custom-select" id="inputGroupSelect04" style="color:#525f7f; left: 25px;">
                        <option selected>Departamento</option>
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

      <!--MODAL VER DEPARTAMENTOS DE LAS CARRERAS -->
      <div class="modal fade" id="ModalDepartamentos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5  align="center" class="modal-title" id="exampleModalLabel">DEPARTAMENTO</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="padding-bottom: 60px; padding-top: 30px;">
              <form>
                <div class="row form-group col-auto col-12" style="height: 25px;">
                  <label for="recipient-name" class="col-form-label col-6 "style="padding-left: 0px ">Departamento:</label>
                  <label for="recipient-name" class="col-form-label col-6" style="padding-left: 25px">Carrera:</label>
                </div>
                <div class="row form-group col-auto col-12" style="height: 25px;">
                    <label for="recipient-name" class="col-form-label col-6 "style="padding-left: 0px ">Sistemas y Computacion</label>
                    <label for="recipient-name" class="col-form-label col-6" style="padding-left: 25px">Ingenieria en Sistemas Computacionales</label>
                  </div>
                <table class="table tablesorter col-lg-12 col-md-9 col-sm-8 col-xs-6" id="" >
                    <thead class=" text-primary" style="border: Gray 2px solid; background: #28CA00; ">
                        <th scope="col">{{ __('No Serie') }}</th>
                        <th scope="col">{{ __('Nombre') }}</th>
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



         <!--MODAL VER CALIFICACIONES-->
         <div class="modal fade" id="ModalCalificaciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5  align="center" class="modal-title" id="exampleModalLabel">CALIFICACIONES</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" style="padding-bottom: 60px; padding-top: 30px;">
                  <form>
                    <div class="row form-group col-auto col-12" style="height: 25px;">
                      <label for="recipient-name" class="col-form-label col-6 "style="padding-left: 0px ">Calificaciones:</label>           
                    </div>
                    <table class="table tablesorter col-lg-12 col-md-9 col-sm-8 col-xs-6" id="" >
                        <thead class=" text-primary" style="border: Gray 2px solid; background: #28CA00; ">
                            <th scope="col">{{ __('Materia') }}</th>
                            <th scope="col">{{ __('Unidad I') }}</th>
                            <th scope="col">{{ __('Unidad II') }}</th>
                            <th scope="col">{{ __('Unidad III') }}</th>
                            <th scope="col">{{ __('Unidad VI') }}</th>
                            <th scope="col">{{ __('Unidad V') }}</th>
                        </thead>
                        <tbody style="background: whitesmoke; border: Gray 2px solid;">
                            @foreach ($users as $user)
                                <tr>                                
                                    <td>
                                        <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
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


            <!--MODAL INSCRIPCIONES -->
            <div class="modal fade" id="ModalInscripciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5  align="center" class="modal-title" id="exampleModalLabel">Inscripciones</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body" style="padding-bottom: 60px; padding-top: 30px;">
                      <form>
                        <div class="row col-12" style="top: 20px;">
                
                            <select class="col-6 custom-select" id="inputGroupSelect04" style="color:#525f7f;">
                              <option selected>Plantel</option>
                              <option value="1">One</option>
                              <option value="2">Two</option>
                              <option value="3">Three</option>
                            </select>
        
                            <select class="col-6 custom-select" id="inputGroupSelect04" style="color:#525f7f; left: 25px;">
                                <option selected>Departamento</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select>
                        </div>
  
                        <div class="row col-12" style="top: 20px;">
                
                            <select class="col-6 custom-select" id="inputGroupSelect04" style="color:#525f7f;">
                              <option selected>Plantel</option>
                              <option value="1">One</option>
                              <option value="2">Two</option>
                              <option value="3">Three</option>
                            </select>
        
                            <select class="col-6 custom-select" id="inputGroupSelect04" style="color:#525f7f; left: 25px;">
                                <option selected>Departamento</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select>
                        </div>
                       
        <div class="row form-group col-auto col-12" style="top: 40px;">
                        <div class="row form-group col-auto col-12" style="height: 25px;">
                          <label for="recipient-name" class="col-form-label col-6 "style="padding-left: 0px ">Inscripciones:</label>           
                        </div>
                        <table class="table tablesorter col-lg-12 col-md-9 col-sm-8 col-xs-6" id="" >
                            <thead class=" text-primary" style="border: Gray 2px solid; background: #28CA00; ">
                                <th scope="col">{{ __('Materia') }}</th>
                                <th scope="col">{{ __('Unidad I') }}</th>
                                <th scope="col">{{ __('Unidad II') }}</th>
                                <th scope="col">{{ __('Unidad III') }}</th>
                                <th scope="col">{{ __('Unidad VI') }}</th>
                                <th scope="col">{{ __('Unidad V') }}</th>
                            </thead>
                            <tbody style="background: whitesmoke; border: Gray 2px solid;">
                                @foreach ($users as $user)
                                    <tr>                                
                                        <td>
                                            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                        </td>           
                                    </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>       
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary " style="left: 355px;" >Guardar</button>
            </div>
          </div>
        </div>
      </div>

                 
          <!-- MODALES PDF DOCUMENTOS-->    
          <div class="modal fade" id="ModalPDF1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog" role="document" style="
            margin-top: 0px;
        ">
              <div class="modal-content" style="
              height: 400px;
          ">
                <div class="modal-header">
                  <h5  align="center" class="modal-title" id="exampleModalLabel">Documentos</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" style="padding-bottom: 60px; padding-top: 30px;">
                  <form>  
          <div class="sidebar" style="height: 200px;">
            <ul class="menu">
              <li>
                <a>Modales</a>
                      <ul>
                  <li data-toggle="modal" data-target="#ModalPDF"><a>Mostrar PDF 1</a></li>
                  <li data-toggle="modal" data-target="#ModalPDF"><a>Mostrar PDF 2</a></li>
                  <li data-toggle="modal" data-target="#ModalPDF"><a>Mostrar PDF 3</a></li>
                  <li data-toggle="modal" data-target="#ModalPDF"><a>Mostrar PDF 4</a></li>
                  <li data-toggle="modal" data-target="#ModalPDF"><a>Mostrar PDF 5</a></li>
                  <li data-toggle="modal" data-target="#ModalPDF"><a>Mostrar PDF 6</a></li>
                </ul>		
              </li>
            </ul>
          </div>
          
          <div class="modal fade" id="ModalPDF" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-fluid modal-notify modal-info" role="document">
              <!--Content-->
              <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                  <p class="heading lead">Modal PDF</p>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                  </button>
                </div>
          
                <!--Body-->
                <div class="modal-body">
          
                  <object class="PDFdoc" width="100%" height="500px" type="application/pdf" data="https://www.antennahouse.com/XSLsample/pdf/sample-link_1.pdf"></object>
                </div>
          
                <!--Footer-->
                <div class="modal-footer justify-content-center">
                  <a type="button" class="btn btn-info">Descargar <i class="far fa-file-pdf ml-1 text-white"></i></a>
                  <a type="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">Cerrar <i class="fas fa-times ml-1"></i></a>
                </div>
              </div>
              <!--/.Content-->
            </div>
          </div>
        </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary " style="left: 355px;" >Guardar</button>
    </div>
  </div>
</div>
</div>
                    
@endsection
