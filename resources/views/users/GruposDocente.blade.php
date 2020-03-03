@extends('layouts.app', ['page' => __('PORTAL DEL DOCENTE'), 'pageSlug' => 'users'])

@section('content')

                <h1 align="center"> HORARIO DEL DOCENTE </h1>

                <div class="row form-group col-auto col-12" style="height: 25px;">
                    <label for="recipient-name" class="col-form-label col-6 "style="padding-left: 0px ">Informacion Personal del Docente:</label>           
                  </div>



             <table class="table tablesorter col-lg-12 col-md-9 col-sm-8 col-xs-6" id="" >
                            <thead class=" text-primary" style="border: Gray 2px solid; background: #28CA00; ">
                                <th scope="col">{{ __('ID') }}</th>
                                <th scope="col">{{ __('Grupo') }}</th>
                                <th scope="col">{{ __('Unidad') }}</th>
                                <th scope="col">{{ __('Departamento') }}</th>
                                <th scope="col">{{ __('Carrera') }}</th>
                          
                    </thead>
                    <tbody style="background: whitesmoke; border: Gray 2px solid;">
                        @foreach ($users as $user)
                            <tr>                                
                                <td>
                                    <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                </td>           
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>

                                        
@endsection