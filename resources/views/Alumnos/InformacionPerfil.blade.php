@extends('layouts.app', ['page' => __('Planteles'), 'pageSlug' => 'planteles'])
@section('content')
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

      @endsection
