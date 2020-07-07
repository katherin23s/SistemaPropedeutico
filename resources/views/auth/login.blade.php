@extends('layouts.app', ['class' => 'login-page', 'page' => 'Inicio de Sesión', 'contentClass' => 'login-page'])

@section('content')
    <div class="col-md-10 text-center ml-auto mr-auto">
        <h3 class="mb-5">Inicio de Sesión</h3>
    </div>
    <div class="col-lg-4 col-md-6 ml-auto mr-auto">
        @isset($url)
        <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
        @else
        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
        @endisset
            @csrf

            <div class="card card-login card-white">
                    <div class="input-group-text">
                        <i class="tim-icons icon-lock-circle"></i>
                    </div>
            
                    <div style="margin-left: 125px;">
                        <span class="fa fa-user fa-6x">
                    </span> 
                </div>
                <div class="card-body">
                    <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-email-85"></i>
                            </div>
                        </div>
                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ _('Email') }}">
                        @include('alerts.feedback', ['field' => 'email'])
                    </div>
                    <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-lock-circle"></i>
                            </div>
                        </div>
                        <input type="password" placeholder="{{ _('Password') }}" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
                        @include('alerts.feedback', ['field' => 'password'])
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" href="" class="btn btn-primary btn-lg btn-block mb-3">{{ _('Acceder') }}</button>
                    {{-- <div class="pull-left">
                        <h6>
                            <a href="{{ route('register') }}" class="link footer-link">{{ _('Registrarse') }}</a>
                        </h6>
                    </div> --}}
                    <div class="pull-right">
                        <h6>
                            <a href="{{ route('password.request') }}" class="link footer-link">{{ _('¿Olvidaste tu cuenta?') }}</a>
                        </h6>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
