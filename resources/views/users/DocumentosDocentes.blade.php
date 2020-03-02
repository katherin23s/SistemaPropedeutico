@extends('layouts.app', ['page' => __('PORTAL DEL DOCENTE'), 'pageSlug' => 'users'])

@section('content')

<h1 align="center"> DOCUMENTOS DEL DOCENTE </h1>

<div class="row form-group col-auto col-12" style="height: 25px;">
    <label for="recipient-name" class="col-form-label col-6 "style="padding-left: 0px ">Documentos del Alumno:</label>           
  </div>

<div class="input-group">
    <div class="input-group-prepend">
      <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
    </div>
    <div class="custom-file">
      <input type="file" class="custom-file-input" id="inputGroupFile01"
        aria-describedby="inputGroupFileAddon01">
      <label class="custom-file-label" for="inputGroupFile01" style="background-color:#dbc8c5">Choose file</label>
    </div>
  </div>
                                    
@endsection
