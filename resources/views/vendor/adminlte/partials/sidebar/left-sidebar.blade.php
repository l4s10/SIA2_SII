<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">
    {{-- Sidebar brand logo --}}
    @if(config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif

    {{-- Sidebar menu --}}
    <div class="sidebar">
        <nav class="pt-2">

            {{-- LeftBar --}}
            <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}"
                data-widget="treeview" role="menu"
                @if(config('adminlte.sidebar_nav_animation_speed') != 300)
                    data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}"
                @endif
                @if(!config('adminlte.sidebar_nav_accordion'))
                    data-accordion="false"
                @endif>

                <!-- Configured sidebar links -->
                @each('adminlte::partials.sidebar.menu-item', $adminlte->menu('sidebar'), 'item')

                <!-- Header Módulos Funcionario -->
                @role('ADMINISTRADOR|FUNCIONARIO|SERVICIOS|INFORMATICA|JURIDICO|CONDUCTOR')
                <li class="nav-header">Módulos Funcionario</li>
                @endrole

                @role('ADMINISTRADOR|FUNCIONARIO|SERVICIOS|INFORMATICA|JURIDICO|CONDUCTOR')
                <!-- Solicitudes vehiculares -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-fw fa-car nav-icon"></i>
                        <p>Solicitudes vehiculares <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('reserva/vehiculo') }}" class="nav-link">
                                <i class="fas fa-fw fa-eye nav-icon"></i>
                                <p>Ver Solicitudes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('reserva/vehiculo/create') }}" class="nav-link">
                                <i class="fas fa-fw fa-plus nav-icon"></i>
                                <p>Solicitar</p>
                            </a>
                        </li>
                        {{-- !!AUTORIZAR SOLO PUEDEN VER LOS DE ADMINISTRADOR --}}
                        @role('ADMINISTRADOR')
                            <li class="nav-item">
                                <a href="{{ url('reserva/vehiculo/autorizar') }}" class="nav-link">
                                    <i class="fa-solid fa-file-circle-check nav-icon"></i>
                                    <p>Autorizar</p>
                                </a>
                            </li>
                        @endrole
                        {{-- !!RENDIR PUEDEN VER TODOS SI ES QUE TIENEN SOLICITUDES POR RENDIR --}}
                        <li class="nav-item">
                            <a href="{{url('reserva/vehiculo/rendir')}}" class="nav-link">
                                <i class="fa-solid fa-car nav-icon"></i>
                                <p>Rendir</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Materiales -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-fw fa-paperclip nav-icon"></i>
                        <p>Materiales <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('solmaterial') }}" class="nav-link">
                                <i class="fas fa-fw fa-eye nav-icon"></i>
                                <p>Ver Solicitudes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('solmaterial/create') }}" class="nav-link">
                                <i class="fas fa-fw fa-plus nav-icon"></i>
                                <p>Solicitar</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Reparaciones y Mantenciones -->
                <li class="nav-item">
                    <a href="{{ url('repyman') }}" class="nav-link">
                        <i class="fas fa-fw fa-solid fa-wrench nav-icon"></i>
                        <p>Reparaciones y Mantenciones</p>
                    </a>
                </li>

                <!-- Equipos -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-fw fa-desktop nav-icon"></i>
                        <p>Equipos <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('solequipos') }}" class="nav-link">
                                <i class="fas fa-fw fa-eye nav-icon"></i>
                                <p>Ver Solicitudes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('solequipos/create') }}" class="nav-link">
                                <i class="fas fa-fw fa-plus nav-icon"></i>
                                <p>Solicitar</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Formularios -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-fw fa-pencil-alt nav-icon"></i>
                        <p>Formularios <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        @role('ADMINISTRADOR|SERVICIOS')
                        <li class="nav-item">
                            <a href="{{ url('formularios') }}" class="nav-link">
                                <i class="fas fa-fw fa-eye nav-icon"></i>
                                <p>Ver Formularios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('formularios/create') }}" class="nav-link">
                                <i class="fas fa-fw fa-plus nav-icon"></i>
                                <p>Agregar Formulario</p>
                            </a>
                        </li>
                        @endrole
                        <li class="nav-item">
                            <a href="{{ url('formulariosSol') }}" class="nav-link">
                                <i class="fas fa-fw fa-eye nav-icon"></i>
                                <p>Ver Solicitudes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('formulariosSol/create') }}" class="nav-link">
                                <i class="fas fa-fw fa-plus nav-icon"></i>
                                <p>Solicitar</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Reservas -->
                <li class="nav-item">
                    <a href="{{ url('reservas') }}" class="nav-link">
                        <i class="fas fa-fw fa-building nav-icon"></i>
                        <p>Reservas</p>
                    </a>
                </li>
                @endrole

                @role('ADMINISTRADOR|SERVICIOS|INFORMATICA')
                <!-- Inventario -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-fw fa-boxes nav-icon"></i>
                        <p>Inventario <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        @role('ADMINISTRADOR|SERVICIOS')
                        <li class="nav-item">
                            <a href="{{url('materiales')}}" class="nav-link">
                                <i class="fas fa-fw fa-eye nav-icon"></i>
                                <p>Ver Materiales</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('materiales/create')}}" class="nav-link">
                                <i class="fas fa-fw fa-plus nav-icon"></i>
                                <p>Agregar Materiales</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('tipomaterial')}}" class="nav-link">
                                <i class="fas fa-fw fa-eye nav-icon"></i>
                                <p>Tipos Materiales</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('tipomaterial/create')}}" class="nav-link">
                                <i class="fas fa-fw fa-plus nav-icon"></i>
                                <p>Agregar Tipo Material</p>
                            </a>
                        </li>
                        @endrole
                        @role('ADMINISTRADOR|INFORMATICA')
                        <li class="nav-item">
                            <a href="{{url('equipos')}}" class="nav-link">
                                <i class="fas fa-fw fa-eye nav-icon"></i>
                                <p>Ver Equipos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('equipos/create')}}" class="nav-link">
                                <i class="fas fa-fw fa-plus nav-icon"></i>
                                <p>Agregar Equipo</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('tipoequipos')}}" class="nav-link">
                                <i class="fas fa-fw fa-eye nav-icon"></i>
                                <p>Ver Tipo Equipos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('tipoequipos/create')}}" class="nav-link">
                                <i class="fas fa-fw fa-plus nav-icon"></i>
                                <p>Agregar Tipo Equipo</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('salas')}}" class="nav-link">
                                <i class="fas fa-fw fa-eye nav-icon"></i>
                                <p>Ver Sala/Bodega</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('salas/create')}}" class="nav-link">
                                <i class="fas fa-fw fa-plus nav-icon"></i>
                                <p>Agregar Sala/Bodega</p>
                            </a>
                        </li>
                        @endrole
                    </ul>
                </li>
                @endrole
                @role('ADMINISTRADOR|SERVICIOS|INFORMATICA')
                <li class="nav-item">
                    <a href="{{url('reporteshome')}}" class="nav-link">
                        <i class="fas fa-fw fa-solid fa-chart-simple nav-icon"></i>
                        <p>Reportes</p>
                    </a>
                </li>
                @endrole

                <!-- Header Administrador -->
                <li class="nav-header">Módulos Reservados</li>

                <!-- Módulo de Directivos -->
                @role('ADMINISTRADOR|INFORMATICA|JURIDICO|FUNCIONARIO|SERVICIOS|CONDUCTOR')
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-user-tie nav-icon"></i>
                        <p>Directivos <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                <p>Buscar Resoluciones<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('busquedafuncionario') }}" class="nav-link">
                                        <i class="fas fa-fw fa-eye nav-icon"></i>
                                        <p>Por funcionario</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('busquedaavanzada') }}" class="nav-link">
                                        <i class="fas fa-fw fa-eye nav-icon"></i>
                                        <p>Avanzada</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @role('ADMINISTRADOR|JURIDICO')
                        <li class="nav-item">
                            {{-- !!FALTA LA RUTA HACIA REPOSITORIO --}}
                            <a href="#" class="nav-link">
                                <i class="fa-solid fa-folder-minus"></i>
                                <p>Repositorio <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('resolucion') }}" class="nav-link">
                                        <i class="fas fa-fw fa-file-circle-check nav-icon"></i>
                                        <p>Resoluciones</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('polizas') }}" class="nav-link">
                                        <i class="fas fa-fw fa-car-side nav-icon"></i>
                                        <p>Pólizas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('facultades') }}" class="nav-link">
                                        <i class="fas fa-fw fa-square-check nav-icon"></i>
                                        <p>Facultades</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('cargos') }}" class="nav-link">
                                        <i class="fas fa-fw fa-person-rays nav-icon"></i>
                                        <p>Cargos</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endrole
                    </ul>
                </li>
                @endrole

                <!-- Panel de control -->
                @role('ADMINISTRADOR|SERVICIOS|INFORMATICA')
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-gears nav-icon"></i>
                        <p>Panel de control <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        @role('ADMINISTRADOR|SERVICIOS')
                        <li class="nav-item">
                            <a href="{{url('vehiculos')}}" class="nav-link">
                                <i class="fas fa-fw fa-car nav-icon"></i>
                                <p>Administrar Vehiculos</p>
                            </a>
                            <li class="nav-item">
                                <a href="{{url('materiales/auditoria')}}" class="nav-link">
                                    <i class="fas fa-fw fa-paperclip nav-icon"></i>
                                    <p>Auditoria Materiales</p>
                                </a>
                            </li>
                        </li>
                        @endrole
                        @role('ADMINISTRADOR|INFORMATICA')
                        <li class="nav-item">
                            <a href="{{url('funcionarios')}}" class="nav-link">
                                <i class="fas fa-fw fa-users nav-icon"></i>
                                <p>Administrar Usuarios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('region')}}" class="nav-link">
                                <i class="fas fa-fw fa-map nav-icon"></i>
                                <p>Administrar Regiones</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('comuna')}}" class="nav-link">
                                <i class="fas fa-fw fa-map-location-dot nav-icon"></i>
                                <p>Administrar Comunas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('direccionregional')}}" class="nav-link">
                                <i class="fa-solid fa-location-arrow nav-icon"></i>
                                <p>Administrar Direcciones Regionales</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('ubicacion')}}" class="nav-link">
                                <i class="fas fa-fw fa-users nav-icon"></i>
                                <p>Administrar Ubicaciones y Departamentos</p>
                            </a>
                        </li>
                        @endrole
                    </ul>
                </li>
                @endrole

            </ul>
        </nav>
    </div>
</aside>
