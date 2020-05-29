@extends('layouts.app', ['page' => __('Documentos'), 'pageSlug' => 'documentos'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">  
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Documentos</h4>
                            <div class="row">    
                                <div class="col-md-10">
                                    <!-- Search form -->
                                    <form method="get" action="{{ route('documentos.index') }}" >                                
                                        <div class="form-row">
                                            <div class="col-md-2">
                                                <select name="cantidad"> 
                                                    <option value='10' {{ $cantidad == 10 ? 'selected' : '' }} >10</option>
                                                    <option value='15' {{ $cantidad == 15 ? 'selected' : '' }}>15</option>
                                                    <option value='20' {{ $cantidad == 20 ? 'selected' : '' }}>20</option>
                                                    <option value='50' {{ $cantidad == 50 ? 'selected' : '' }}>50</option>
                                                    <option value='100' {{ $cantidad == 100 ? 'selected' : '' }}>100</option>
                                                    <option value='5000' {{ $cantidad == 5000 ? 'selected' : '' }}>Todos</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <select name="estado" id="estado">
                                                    <option value='10' {{ $estado == 10 ? 'selected' : '' }}>Todos</option>
                                                    <option value='0' {{ $estado == 0 ? 'selected' : '' }}>Pendiente de revisión</option>
                                                    <option value='1' {{ $estado == 1 ? 'selected' : '' }}>Aprobado</option>
                                                    <option value='2' {{ $estado == 2 ? 'selected' : '' }}>Rechazado</option>
                                                    <option value='3' {{ $estado == 3 ? 'selected' : '' }}>Pendiente de enviar</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-auto">
                                                <input name="busqueda" class="form-control" type="text" value="{{ $busqueda }}" placeholder="Buscar" aria-label="Search"> 
                                            </div>   
                                            <div class="col-md-2">
                                                <button class="btn btn-primary btn-fab btn-icon">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>                
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @include('alerts.success')             
                            @include('Admin.Documentos.tabla')          
                        </div>            
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Admin.Documentos.editarModal')
@endsection


