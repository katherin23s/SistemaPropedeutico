@extends('layouts.Alumnos.app', ['page' => 'Horario', 'pageSlug' => 'horario'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">  
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">{{ $alumno->nombre }}</h4>
                        <div class="row">
                            <div class="col-md-3">   
                                 <h6> Semestre {{ $alumno->grupo->semestre->periodo() }} </h6>
                            </div>  
                            <div class="col-md-3">                   
                                <h6> Carrera {{ $alumno->grupo->carrera->nombre }} </h6>
                            </div>
            
                            <div class="col-md-6">
                                <h6> Horario {{ $alumno->grupo->horarioCompleto() }} </h6>
                            </div>
                        </div>
                    </div>
                
                    <div class="card-body">
                        @include('alerts.success')
                        @include('components.tablaClases', ['clases' => $alumno->grupo->clases])
                                                                             
                    </div>
                    <div class="card-footer py-4">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('js')
<script>

</script>
@endpush