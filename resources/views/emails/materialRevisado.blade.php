@component('mail::message')
# Hola {{ $material->clase->docente->nombre }}

Su material <a href="{{ $material->ubicacion }}">{{ $material->nombre }} </a> ha sido : 

<h1>{{ $material->estado() }}</h1>

<h3>{{ $material->comentarios }}</h3>

@component('mail::button', ['url' => '/docente/materiales'])
Materiales
@endcomponent
    Gracias
@endcomponent
