<div class="sidebar">
    <div class="sidebar-wrapper" style="background: #28CA00;">
              <!-- MENU SIDEBAR -->
        <ul class="nav ">
            <li @if ($pageSlug ?? '' == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ _('Dashboard') }}</p>
                </a>
            </li>
            <!-- TODO: GESTION DE OFERTA EDUCATIVA -->
            <li>            
                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile' ?? '' ) class="active " @endif>
                            <a href="{{ route('InformacionPerfilAlumno')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ _('Informacion Perfil') }}</p>
                            </a>
                        </li>          
                    </ul>
                </div>
            </li>
             <!-- TODO: DOCUMENTOS -->
             <li>
                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile' ?? '' ) class="active " @endif>
                            <a href="{{ route('DocumentosAlumnos')  }}">
                                <i class="tim-icons icon-single-copy-04"></i>
                                <p>{{ _('Documentos Alumnos') }}</p>
                            </a>
                        </li>          
                    </ul>
                </div>
        
            </li>
            <!-- -->
            <!-- TODO: HORARIO-->
            <li>
           
                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile' ?? '' ) class="active " @endif>
                            <a href="{{ route('HorarioAlumno')  }}">
                                  <i class="tim-icons icon-time-alarm"></i>  
                                <p>{{ _('Horario Alumno') }}</p>
                            </a>
                        </li>          
                    </ul>
                </div>       
            </li>
            <!-- -->   
             <!-- TODO: KARDEX -->
             <li>           
                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile' ?? '' ) class="active " @endif>
                            <a href="{{ route('Kardex_Alumno')  }}">
                                <i class="tim-icons icon-puzzle-10"></i>
                                <p>{{ _('Kardex') }}</p>
                            </a>
                        </li>          
                    </ul>
                </div>
                
            </li> 

             <!-- TODO: CONFIGURACION -->
             <li>
                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile' ?? '' ) class="active " @endif>
                            <a href="{{ route('ConfiguracionAlumno')  }}">
                                <i class="tim-icons icon-settings-gear-63"></i>
                                <p>{{ _('Configuracion') }}</p>
                            </a>
                        </li>          
                    </ul>
                </div>
                
            </li> 

        </ul>
    </div>
</div>