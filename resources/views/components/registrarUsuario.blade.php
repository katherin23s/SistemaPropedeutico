{{--  nombre  --}}
<div class="form-group {{ $errors->has('nombre') ? ' has-danger' : '' }}">               
    <label for="input-nombre">Nombre</label>
    <input type="text" name="nombre" id="input-nombre" class="form-control {{ $errors->has('nombre') ? ' is-invalid' : '' }}" 
    value="{{ old('nombre') }}" required>
    @if ($errors->has('nombre'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('nombre') }}</strong>
        </span>
    @endif
</div>
{{--  direccion  --}}
<div class="form-group {{ $errors->has('direccion') ? ' has-danger' : '' }}">               
    <label for="input-direccion">Dirección</label>
    <input type="text" name="direccion" id="input-direccion" class="form-control {{ $errors->has('direccion') ? ' is-invalid' : '' }}" 
    value="{{ old('direccion') }}" required>
    @if ($errors->has('direccion'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('direccion') }}</strong>
        </span>
    @endif
</div>
{{--  telefono  --}}
<div class="form-group {{ $errors->has('telefono') ? ' has-danger' : '' }}">               
    <label for="input-telefono">Teléfono</label>
    <input type="text" name="telefono" id="input-telefono" class="form-control {{ $errors->has('telefono') ? ' is-invalid' : '' }}" 
    value="{{ old('telefono') }}" required>
    @if ($errors->has('telefono'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('telefono') }}</strong>
        </span>
    @endif
</div>
<div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
    <div class="input-group-prepend">
        <div class="input-group-text">
            <i class="tim-icons icon-email-85"></i>
        </div>
    </div>
    <input id="input-email" type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ _('Email') }}" value="{{ old('email') }}">
    @include('alerts.feedback', ['field' => 'email'])
</div>
<div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
    <div class="input-group-prepend">
        <div class="input-group-text">
            <i class="tim-icons icon-lock-circle"></i>
        </div>
    </div>
    <input id="input-password" type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ _('Password') }}">
    @include('alerts.feedback', ['field' => 'password'])
</div>
{{-- <div class="input-group">
    <div class="input-group-prepend">
        <div class="input-group-text">
            <i class="tim-icons icon-lock-circle"></i>
        </div>
    </div>
    <input type="password" name="password_confirmation" class="form-control" placeholder="{{ _('Confirm Password') }}">
</div> --}}
<div style="display: none;">
    <input name="agree_terms_and_conditions"  type="checkbox" checked>
</div>