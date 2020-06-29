@extends('layouts.app', ['class' => 'login-page', 'page' => 'Nueva contraseña', 'contentClass' => 'login-page'])

@section('content')
    <div class="col-lg-5 col-md-7 ml-auto mr-auto">
        <form class="form" method="post" action="{{ route('password.email') }}">
            @csrf

            <div class="card card-login card-white">
                {{-- <div class="card-header">
                    <h1 class="card-title text-primary">{{ _('Cambiar contraseña') }}</h1>
                </div> --}}
                <div class="card-body">
                    <h3>Cambiar contraseña</h3>
                    @include('alerts.success')

                    <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-email-85"></i>
                            </div>
                        </div>
                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Correo">
                        @include('alerts.feedback', ['field' => 'email'])
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-lg btn-block mb-3">Enviar</button>
                </div>
            </div>
        </form>
    </div>
@endsection
