@component('mail::message')
# Hola {{ $documento->alumno->nombre }}

Su documento <a href="{{ $documento->ubicacion }}">{{ $documento->nombre }} </a> ha sido : 

<h1>{{ $documento->estado() }}</h1>

<h3>{{ $documento->comentarios }}</h3>

@component('mail::button', ['url' => '/alumno/'.$documento->alumno_id .'/documentos'])
Documentos
@endcomponent

Gracias

@endcomponent
