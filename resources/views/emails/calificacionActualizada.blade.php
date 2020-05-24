@component('mail::message')
# Hola

Calificación registrada para la unidad {{ $calificacion_unidad->unidad }} con un valor 
de {{ $calificacion_unidad->valor() }} de la clase {{ $calificacion_unidad->calificacion->clase->materia->nombre }}.

@component('mail::button', ['url' => '/alumno/'.$calificacion_unidad->calificacion->alumno_id .'/kardex'])
Kardex
@endcomponent

Gracias,<br>
{{ $calificacion_unidad->calificacion->clase->docente->nombre }}
@endcomponent
