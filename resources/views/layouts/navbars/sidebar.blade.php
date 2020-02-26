<div class="sidebar">
    <div class="sidebar-wrapper">
              <!-- MENU SIDEBAR -->
        <ul class="nav">
            <li @if ($pageSlug ?? '' == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ _('Dashboard') }}</p>
                </a>
            </li>
            <!-- TODO: GESTION DE OFERTA EDUCATIVA -->
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="false">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Gestion de oferta Educativa') }}</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile' ?? '' ) class="active " @endif>
                            <a href="{{ route('planteles.index')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ _('Planteles') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('Departamento')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ _('Departamento') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('user.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ _('Carrera') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
             <!-- TODO: CURSOS PROPEDEUTICOS -->
             <li>
                <a data-toggle="collapse" href="#laravel-examples3" aria-expanded="false">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Cursos Propedeuticos') }}</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse show" id="laravel-examples3">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="{{ route('Grupo')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ _('Grupos') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('Materia')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ _('Materias') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- -->
            <!-- TODO: GESTION DEL ESTUDIANTE-->
            <li>
                <a data-toggle="collapse" href="#laravel-examples5" aria-expanded="false">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Gestion de Estudiantes') }}</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse show" id="laravel-examples5">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug ?? '' == 'profile') class="active " @endif>
                            <a href="{{ route('GestionAlumnos')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ _('Inscripciones') }}</p>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <!-- -->
             <!-- TODO: GESTION DEL DOCENTE -->
             <li>
                <a data-toggle="collapse" href="#laravel-examples6" aria-expanded="false">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Gestion de Docente') }}</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse show" id="laravel-examples6">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug ?? '' == 'profile') class="active " @endif>
                            <a href="{{ route('GestionDocentes')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ _('Inscripcion') }}</p>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>            
        </ul>
    </div>
</div>
