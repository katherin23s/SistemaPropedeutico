@extends('layouts.Docentes.app', ['page' => 'Materiales', 'pageSlug' => 'materiales'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">  
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">{{ $docente->nombre }}</h4>
                        <div class="row">
                            <div class="col-md-3">   
                                 <h6>Semestre {{ $semestre->periodo() }} </h6>
                            </div>  
                            <div class="col-md-3">                   
                                <h6>Empleado {{ $docente->numero_empleado }}</h6>
                            </div>
            
                            <div class="col-md-6">
                                @if (count($clases) > 0)
                                    <h6> Horario {{ $clases[0]->hora_inicio->format('H:i') . ' - ' . $clases[count($clases)-1]->hora_final->format('H:i') }} </h6>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                
                    <div class="card-body">
                        @include('alerts.success')
                        @include('Docentes.tablaMateriales', ['materiales' => $materiales])
                                                                             
                    </div>
                    <div class="card-footer py-4">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection