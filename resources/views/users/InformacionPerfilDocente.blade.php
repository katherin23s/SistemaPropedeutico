@extends('layouts.app', ['page' => __('PORTAL DEL DOCENTE'), 'pageSlug' => 'users'])

@section('content')
            <div class="modal-body" style="padding-bottom: 60px; padding-top: 30px;">
              <form>
                <h1 align="center"> INFORMACION DE PERFIL DOCENTE</h1>
                <div class="row form-group col-auto col-12" style="height: 25px;">
                  <label for="recipient-name" class="col-form-label col-6 "style="padding-left: 0px ">No Empleado</label>
                  <label for="recipient-name" class="col-form-label col-6" style="padding-left: 25px">Nombre</label>
                </div>
                <div class="row col-12">
                  <input type="text" class=" col-6 form-control" id="recipient-name">
                  <input type="text" class="col-6 form-control" id="recipient-name" style="left: 25px;">
                </div>

                <div class="row form-group col-auto col-12" style="height: 25px;">
                    <label for="recipient-name" class="col-form-label col-12 " style="
                    padding-left: 0px;
                ">Domicilio</label>
                  </div>
                  <div class="row col-12" style="
                  margin-right: 0px;
                  padding-right: 0px;
                  padding-left: 0px;
                  margin-left: 0px;
              ">
                    <input type="text" class=" col-12 form-control" id="recipient-name" style="
                    margin-right: 0px;
                    padding-right: 0px;
                    padding-left: 0px;
                    margin-left: 0px;">
                  </div>


                  <div class="row form-group col-auto col-12" style="height: 25px;">
                    <label for="recipient-name" class="col-form-label col-6 "style="padding-left: 0px ">Telefono</label>
                    <label for="recipient-name" class="col-form-label col-6" style="padding-left: 25px">Correo</label>
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

                <div class="row col-12" style="top: 40px;">
              
                    <select class="col-6 custom-select" id="inputGroupSelect04" style="color:#525f7f;">
                      <option selected>Carrera</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>

                    <select class="col-6 custom-select" id="inputGroupSelect04" style="color:#525f7f; left: 25px;">
                        <option selected>Grupo</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                </div>
              </form>
            </div>
            @endsection
