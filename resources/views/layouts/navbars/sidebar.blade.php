<div class="sidebar">
    <div class="sidebar-wrapper"> {{-- background: #28CA00; --}}
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ _('ITT') }}</a>
            <a href="#" class="simple-text logo-normal">{{ _('Cursos') }}</a>
        </div>
              <!-- MENU SIDEBAR -->
        <ul class="nav">
            <li @if ($pageSlug ?? '' == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>Inicio</p>
                </a>
            </li>
            <!-- TODO: GESTION DE OFERTA EDUCATIVA -->
            <li>
                <a data-toggle="collapse" href="#oferta-educativa" aria-expanded="true" >
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Oferta Educativa') }}</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse show" id="oferta-educativa">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'planteles' ?? '' ) class="active " @endif>
                            <a href="{{ route('planteles.index')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ _('Planteles') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'departamentos') class="active " @endif>
                            <a href="{{ route('departamentos.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ _('Departamentos') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'carreras') class="active " @endif>
                            <a href="{{ route('carreras.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ _('Carreras') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
             <!-- TODO: CURSOS PROPEDEUTICOS -->
             <li>
                <a data-toggle="collapse" aria-expanded="true" href="#cursos" >
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Cursos Propedeuticos') }}</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse show" id="cursos">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'semestres') class="active " @endif>
                            <a href="{{ route('semestres.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ _('Semestres') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'grupos') class="active " @endif>
                            <a href="{{ route('grupos.index')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ _('Grupos') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'materias') class="active " @endif>
                            <a href="{{ route('materias.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ _('Materias') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'clases') class="active " @endif>
                            <a href="{{ route('clases.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>Clases</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- -->
            <!-- TODO: GESTION DEL ESTUDIANTE-->
            <li>
                <a data-toggle="collapse" aria-expanded="true"  href="#alumnos" >
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Gestión de Alumnos') }}</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse show" id="alumnos">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug ?? '' == 'alumnos') class="active " @endif>
                            <a href="{{ route('alumnos.index')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ _('Alumnos') }}</p>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <!-- -->
             <!-- TODO: GESTION DEL DOCENTE -->
             <li>
                <a data-toggle="collapse" aria-expanded="true"  href="#docente">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Gestión de Docente') }}</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse show" id="docente">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug ?? '' == 'docentes') class="active " @endif>
                            <a href="{{ route('docentes.index')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ _('Docentes') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug ?? '' == 'documentos') class="active " @endif>
                            <a href="{{ route('documentos.index')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ _('Documentos') }}</p>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>            
        </ul>
    </div>
</div>
