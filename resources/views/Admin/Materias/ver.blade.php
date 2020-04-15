@extends('layouts.app', ['page' => __('Materias'), 'pageSlug' => 'materias'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">  
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Materia {{ $materia->nombre }}</h4>
                        <div class="row">
                            <div class="col-md-3">   
                                 <h6> Clave {{ $materia->clave}} </h6>
                            </div>  
                            <div class="col-md-3">                   
                                <h6> {{ $materia->creditos}} Creditos </h6>
                            </div>
            
                            <div class="col-md-6">
                                <h6> {{ $materia->unidades }} Unidades</h6>
                            </div>
                        </div>
                    </div>
                     <div class="card-body">
                        @include('alerts.success')
                        
                        @include('Admin.Clases.tabla', ['clases' => $clases])     
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $clases->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
