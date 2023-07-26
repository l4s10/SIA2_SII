<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'SIA 2',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Google Fonts
    |--------------------------------------------------------------------------
    |
    | Here you can allow or not the use of external google fonts. Disabling the
    | google fonts may be useful if your admin panel internet access is
    | restricted somehow.
    |
    | For detailed instructions you can look the google fonts section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'google_fonts' => [
        'allowed' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>SIA2</b>WebApp',
    'logo_img' => 'vendor/adminlte/dist/img/logosii.png',
    'logo_img_class' => 'brand-image',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Admin Logo',

    /*
    |--------------------------------------------------------------------------
    | Authentication Logo
    |--------------------------------------------------------------------------
    |
    | Here you can setup an alternative logo to use on your login and register
    | screens. When disabled, the admin panel logo will be used instead.
    |
    | For detailed instructions you can look the auth logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'auth_logo' => [
        'enabled' => true,
        'img' => [
            'path' => 'vendor/adminlte/dist/img/logosii.png',
            'alt' => 'Auth Logo',
            'class' => '',
            'width' => 60,
            'height' => 50,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Preloader Animation
    |--------------------------------------------------------------------------
    |
    | Here you can change the preloader animation configuration.
    |
    | For detailed instructions you can look the preloader section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'preloader' => [
        'enabled' => true,
        'img' => [
            'path' => 'vendor/adminlte/dist/img/logosii.png',
            'alt' => 'AdminLTE Preloader Image',
            'effect' => 'animation__shake',
            'width' => 200,
            'height' => 160,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-light-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'funcionarios/create',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        // Navbar items:
        [
            'type'         => 'navbar-search',
            'text'         => false,
            'topnav_right' => false,
        ],
        [
            'type'         => 'fullscreen-widget',
            'topnav_right' => false,
        ],

        // Sidebar items:
        [
            'type' => 'sidebar-menu-search',
            'text' => 'Buscar módulos',
        ],
        ['header' => 'Módulos Funcionario'],
        [
            'text'        => 'Solicitudes vehiculares',
            'url'         => '#',
            'icon'        => 'fas fa-fw fa-car',
            'submenu' => [
                [
                    'text'    => 'Ver Solicitudes',
                    'url'     => 'reserva/vehiculo',
                    'icon'    => 'fas fa-fw fa-eye',
                ],
                [
                    'text'    => 'Solicitar',
                    'url'     => 'reserva/vehiculo/create',
                    'icon'    => 'fas fa-fw fa-plus',
                ],
                [
                    'text'    => 'Autorizar',
                    'url'     => 'reserva/vehiculo/autorizar',
                    'icon'    => 'fa-solid fa-file-circle-check',
                ],
                [
                    'text'    => 'Rendir',
                    'url'     => 'reserva/vehiculo/rendir',
                    'icon'    => 'fas fa-fw fa-car',
                ],
            ],
        ],
        [
            'text'        => 'Materiales',
            'url'         => '#',
            'icon'        => 'fas fa-fw fa-paperclip',
            // 'label'       => 'CRUD',
            // 'label_color' => 'danger',
            'submenu' => [
                [
                    'text'    => 'Ver Solicitudes',
                    'url'     => 'solmaterial',
                    'icon'    => 'fas fa-fw fa-eye',
                ],
                [
                    'text'    => 'Solicitar',
                    'url'     => 'solmaterial/create',
                    'icon'    => 'fas fa-fw fa-plus',
                ],
            ],
        ],
        [
            'text'        => 'Reparaciones y Mantenciones',
            'url'         => 'repyman',
            'icon'        => 'fas fa-fw fa-solid fa-wrench',
        ],
        [
            'text'        => 'Equipos',
            'url'         => '#',
            'icon'        => 'fas fa-fw fa-desktop',
            'submenu' => [
                [
                    'text'    => 'Ver Solicitudes',
                    'url'     => 'solequipos',
                    'icon'    => 'fas fa-fw fa-eye',
                ],
                [
                    'text'    => 'Solicitar',
                    'url'     => 'solequipos/create',
                    'icon'    => 'fas fa-fw fa-plus',
                ],
            ],
        ],
        [
            'text'        => 'Formularios',
            'url'         => 'formularios',
            'icon'        => 'fas fa-fw fa-pencil-alt',
            // 'label'       => 'CRUD',
            // 'label_color' => 'danger',
            'submenu' => [
                [
                    'text'    => 'Ver Formularios',
                    'url'     => 'formularios',
                    'icon'    => 'fas fa-fw fa-eye',
                ],
                [
                    'text'    => 'Agregar Formularios',
                    'url'     => 'formularios/create',
                    'icon'    => 'fas fa-fw fa-plus',
                ],
                [
                    'text'    => 'Ver Solicitudes',
                    'url'     => 'formulariosSol',
                    'icon'    => 'fas fa-fw fa-eye',
                ],
                [
                    'text'    => 'Solicitar',
                    'url'     => 'formulariosSol/create',
                    'icon'    => 'fas fa-fw fa-plus',
                ],
            ],
        ],
        [
            'text'        => 'Reservas',
            'url'         => 'reservas',
            'icon'        => 'fas fa-fw fa-building',
        ],
        [
            'text'    => 'Inventario',
                    'url'     => '#',
                    'icon'    =>'fas fa-fw fa-boxes',
                    'submenu' => [
                        [
                            'text'    => 'Ver Materiales',
                            'url'     => 'materiales',
                            'icon'    => 'fas fa-fw fa-eye',
                        ],
                        [
                            'text'    => 'Agregar Materiales',
                            'url'     => 'materiales/create',
                            'icon'    => 'fas fa-fw fa-plus',
                        ],
                        [
                            'text'    => 'Tipos Materiales',
                            'url'     => 'tipomaterial',
                            'icon'    => 'fas fa-fw fa-eye',
                        ],
                        [
                            'text'    => 'Agregar Tipo Material',
                            'url'     => 'tipomaterial/create',
                            'icon'    => 'fas fa-fw fa-plus',
                        ],
                        [
                            'text'    => 'Ver Equipos',
                            'url'     => 'equipos',
                            'icon'    => 'fas fa-fw fa-eye',
                        ],
                        [
                            'text'    => 'Agregar Equipo',
                            'url'     => 'equipos/create',
                            'icon'    => 'fas fa-fw fa-plus',
                        ],
                        [
                            'text'    => 'Ver Tipo Equipos',
                            'url'     => 'tipoequipos',
                            'icon'    => 'fas fa-fw fa-eye',
                        ],
                        [
                            'text'    => 'Agregar Tipo Equipo',
                            'url'     => 'tipoequipos/create',
                            'icon'    => 'fas fa-fw fa-plus',
                        ],
                        [
                            'text'    => 'Ver Sala/Bodega',
                            'url'     => 'categoriasalas',
                            'icon'    => 'fas fa-fw fa-eye',
                        ],
                        [
                            'text'    => 'Agregar Sala/bodega',
                            'url'     => 'categoriasalas/create',
                            'icon'    => 'fas fa-fw fa-plus',
                        ],
                    ],
        ],
        /*[
            'text' => 'Directivos',
            'url' => 'directivos',
            'icon' => 'fa-solid fa-user-tie',
            'can' => ['ADMINISTRADOR', 'INFORMATICA', 'JURIDICO'],
            'submenu' => [
                [
                    'text' => 'Búsqueda Resoluciones',
                    'url' => '#',
                    'icon' => 'fa-solid fa-folder-minus',
                    'submenu' => [
                        [
                            'text' => 'Por Funcionario',
                            'url' => 'busquedafuncionario',
                            'icon' => 'fas fa-fw fa-eye',
                        ],
                        [
                            'text' => 'Avanzada',
                            'url' => 'busquedaavanzada',
                            'icon' => 'fas fa-fw fa-eye',
                        ],
                    ],
                ],
                [
                    'text' => 'Repositorio',
                    'url' => '#',
                    'icon' => 'fa-solid fa-folder-minus',
                    'submenu' => [
                        [
                            'text' => 'Resoluciones',
                            'url' => 'resolucion',
                            'icon' => 'fas fa-fw fa-eye',
                        ],
                        [
                            'text' => 'Pólizas',
                            'url' => 'polizas',
                            'icon' => 'fas fa-fw fa-eye',
                        ],
                        [
                            'text' => 'Facultades',
                            'url' => 'facultades',
                            'icon' => 'fas fa-fw fa-eye',
                        ],
                        [
                            'text' => 'Cargos',
                            'url' => 'cargos',
                            'icon' => 'fas fa-fw fa-eye',
                        ],
                    ],
                ],
            ],
        ],*/
        [
            'text'        => 'Reportes',
            'url'         => '/reporteshome',
            'icon'        => 'fas fa-fw fa-solid fa-chart-simple',
        ],
        /*['header' => 'Módulos Administrador'],
        [
            'text'        => 'Panel de control',
            'url'         => '#',
            'icon'        => 'fas fa-fw fa-gears',
            'submenu' => [
                [
                    'text'        => 'Administrar Usuarios',
                    'url'         => '/funcionarios',
                    'icon'        => 'fas fa-fw fa-users'
                ],
                [
                    'text'        => 'Administrar Vehiculos',
                    'url'         => '/vehiculos',
                    'icon'        => 'fas fa-fw fa-car'
                ],
                [
                    'text'        => 'Administrar Regiones',
                    'url'         => '/region',
                    'icon'        => 'fas fa-fw fa-earth-americas'
                ],
                [
                    'text'        => 'Administrar Comunas',
                    'url'         => '/comuna',
                    'icon'        => 'fas fa-fw fa-street-view'
                ],
                [
                    'text'        => 'Administrar Direcciones Regionales',
                    'url'         => '/direccionregional',
                    'icon'        => 'fa-solid fa-location-arrow'

                ],
                [
                    'text'        => 'Administrar Ubicaciones y Departamentos',
                    'url'         => '/ubicacion',
                    'icon'        => 'fa-solid fa-user-group'
                ]
            ]
        ],
        */
        // [
        //     'text'       => 'important',
        //     'icon_color' => 'red',
        //     'url'        => '#',
        // ],
        // [
        //     'text'       => 'warning',
        //     'icon_color' => 'yellow',
        //     'url'        => '#',
        // ],
        // [
        //     'text'       => 'information',
        //     'icon_color' => 'cyan',
        //     'url'        => '#',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => false,
];
