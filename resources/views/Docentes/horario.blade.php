@extends('layouts.app', ['page' => __('PORTAL DEL DOCENTE'), 'pageSlug' => 'horario'])

@section('content')

                <h1 align="center"> HORARIO DEL DOCENTE </h1>

                <div class="row form-group col-auto col-12" >
                    <label for="recipient-name" class="col-form-label col-6 ">Informacion Personal del Docente:</label>           
                  </div>

                <table class="table tablesorter col-lg-12 col-md-9 col-sm-8 col-xs-6" id="" >
                    <thead class=" text-primary">
                        <th scope="col">{{ __('Informacion') }}</th>
                        <th scope="col">{{ __('Personal del alumno') }}</th>
               
          
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
   
               <div class="row form-group col-auto col-12" >
                      <label for="recipient-name" class="col-form-label col-6 ">Horario:</label>           
                    </div>
                    <table class="table tablesorter col-lg-12 col-md-9 col-sm-8 col-xs-6" id="" >
                        <thead class=" text-primary">
                            <th scope="col">{{ __('Clave') }}</th>
                            <th scope="col">{{ __('Materia') }}</th>
                            <th scope="col">{{ __('Hora') }}</th>
              
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>

                                        
@endsection
