@extends('layouts.app', ['page' => 'alumnos', 'pageSlug' => 'alumnos'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Editar</h5>
                </div>
                
                <form method="post" action="{{ route('alumnos.update', $alumno) }}" autocomplete="off">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                            @include('alerts.success')
                            <div class="form-row">
                                {{--  nombre  --}}
                                <div class="col-lg-8 form-group {{ $errors->has('nombre') ? ' has-danger' : '' }}">
                                    <label for="actualizar-nombre">Nombre</label>
                                    <input type="text" name="nombre" id="actualizar-nombre" class="form-control {{ $errors->has('nombre') ? ' is-invalid' : '' }}" 
                                    value="{{ $alumno->nombre }}" required>
                                    @if ($errors->has('nombre'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nombre') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                {{--  numero_alumno  --}}
                                <div class="col-lg-4 form-group {{ $errors->has('numero_alumno') ? ' has-danger' : '' }}">
                                    <label for="actualizar-numero_alumno">Numero Alumno</label>
                                    <input type="text" name="numero_alumno" id="actualizar-numero_alumno" class="form-control {{ $errors->has('numero_alumno') ? ' is-invalid' : '' }}" 
                                    value="{{ $alumno->numero_alumno }}" required>
                                    @if ($errors->has('numero_alumno'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('numero_alumno') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                {{--  email  --}}
                                <div class="col-lg-8 form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label for="actualizar-email">Correo</label>
                                    <input type="text" name="email" id="actualizar-email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                    value="{{ $alumno->email }}" required>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                {{--  telefono  --}}
                                <div class="col-lg-4 form-group {{ $errors->has('telefono') ? ' has-danger' : '' }}">
                                    <label for="actualizar-telefono">Telefono</label>
                                    <input type="text" name="telefono" id="actualizar-telefono" class="form-control {{ $errors->has('telefono') ? ' is-invalid' : '' }}" 
                                    value="{{ $alumno->telefono }}" required>
                                    @if ($errors->has('telefono'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('telefono') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                {{--  direccion  --}}
                                <div class="col-lg-8 form-group {{ $errors->has('direccion') ? ' has-danger' : '' }}">
                                    <label for="actualizar-direccion">Direccion</label>
                                    <input type="text" name="direccion" id="actualizar-direccion" class="form-control {{ $errors->has('direccion') ? ' is-invalid' : '' }}" 
                                    value="{{ $alumno->direccion }}" required>
                                    @if ($errors->has('direccion'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('direccion') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                {{--  escuela_procedencia  --}}
                                <div class="col-lg-4 form-group {{ $errors->has('escuela_procedencia') ? ' has-danger' : '' }}">
                                    <label for="actualizar-escuela_procedencia">Escuela Procedencia</label>
                                    <input type="text" name="escuela_procedencia" id="actualizar-escuela_procedencia" class="form-control {{ $errors->has('escuela_procedencia') ? ' is-invalid' : '' }}" 
                                    value="{{ $alumno->escuela_procedencia }}" required>
                                    @if ($errors->has('escuela_procedencia'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('escuela_procedencia') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn  btn-success btn-block">Guardar</button>
                    </div>
                </form>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="title"></h5>
                </div>
                <div class="card-body">
                   
                </div>
                <div class="card-footer">
                        
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                        <div class="author">
                            <div class="block block-one"></div>
                            <div class="block block-two"></div>
                            <div class="block block-three"></div>
                            <div class="block block-four"></div>
                            <a href="#">
                                <img class="avatar" src="{{ asset('white') }}/img/emilyz.jpg" alt="">
                                <h5 class="title">{{ $alumno->nombre }}</h5>
                            </a>
                            <p class="description">
                                {{ $alumno->numero_alumno }}
                            </p>
                        </div>
                    </p>
                    <div class="card-description">
                        <p>{{ $alumno->direccion }}</p>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-center">
                        <a rel="tooltip" class="btn btn-success btn-round btn-icon" type="button" href="{{ route('alumnos.ver', $alumno) }} ">
                            <i class="fa fa-eye "></i>
                        </a>
                        <a rel="tooltip" class="btn btn-danger btn-round btn-icon" style="color: white;"  type="button" onClick="Eliminar({{ $alumno->id }})">
                                <i class="fa fa-trash"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
