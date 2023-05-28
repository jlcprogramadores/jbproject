<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta lang="es">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- TailwindCSS -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    @livewireStyles

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/JB-min.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('css')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('login') }}">
                    <img src="{{ asset('images/JB-min.png') }}" class="imgjb">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @if (Auth::check() && Auth::user()->es_activo)
                            @can('menu.finanzas')
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white fs-5" href="#"
                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        v-pre>
                                        Finanzas
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        @can('finanzas.index')
                                            <a class="dropdown-item" href="{{ route('finanzas.index') }}">
                                                {{ __('Finanzas') }}
                                            </a>
                                        @endcan
                                        @can('finanzas.indexEgreso')
                                            <a class="dropdown-item" href="{{ route('finanzas.indexEgreso') }}">
                                                {{ __('Egresos') }}
                                            </a>
                                        @endcan
                                        @can('finanzas.indexIngreso')
                                            <a class="dropdown-item" href="{{ route('finanzas.indexIngreso') }}">
                                                {{ __('Ingresos') }}
                                            </a>
                                        @endcan
                                        @can('menu.top')
                                            <a class="dropdown-item" href="{{ route('finanzas.topGeneral') }}">
                                                {{ __('Top Egresos e Ingresos') }}
                                            </a>
                                        @endcan
                                        @can('menu.filtros')
                                            <a class="dropdown-item" href="{{ route('finanzas.filtros') }}">
                                                {{ __('Filtros') }}
                                            </a>
                                        @endcan
                                        @can('menu.graficas')
                                            <a class="dropdown-item" href="{{ route('finanzas.graficasProyectos') }}">
                                                {{ __('Gráficas por Proyecto') }}
                                            </a>
                                            <a class="dropdown-item" href="{{ route('finanzas.graficasGenerales') }}">
                                                {{ __('Gráficas Generales') }}
                                            </a>
                                        @endcan
                                        @can('menu.centrodecostos')
                                            <a class="dropdown-item" href="{{ route('finanzas.centrodecostos') }}">
                                                {{ __('Centro de Costos') }}
                                            </a>
                                        @endcan
                                        @can('menu.clientes')
                                            <a class="dropdown-item" href="{{ route('clientes.index') }}">
                                                {{ __('Clientes') }}
                                            </a>
                                        @endcan
                                        @can('menu.proveedores')
                                            <a class="dropdown-item" href="{{ route('proveedores.index') }}">
                                                {{ __('Proveedores') }}
                                            </a>
                                        @endcan
                                        @can('menu.proyectos')
                                            <a class="dropdown-item" href="{{ route('proyectos.index') }}">
                                                {{ __('Proyectos') }}
                                            </a>
                                        @endcan
                                        <div class="dropdown-divider"></div>
                                        <li>
                                            <a class="dropdown-item " href="">
                                                {{ __('Configuración') }} &raquo;
                                            </a>
                                            <ul class="submenu dropdown-menu">
                                                <li>
                                                    @can('menu.categorias-de-entrada')
                                                        <a class="dropdown-item"
                                                            href="{{ route('categorias-de-entradas.index') }}">
                                                            {{ __('Categorías de entrada') }}
                                                        </a>
                                                    @endcan
                                                </li>
                                                <li>
                                                    @can('menu.categorias-familias')
                                                        <a class="dropdown-item"
                                                            href="{{ route('categorias-familias.index') }}">
                                                            {{ __('Categorías Familias') }}
                                                        </a>
                                                    @endcan
                                                </li>
                                                <li>
                                                    @can('menu.familias')
                                                        <a class="dropdown-item" href="{{ route('familias.index') }}">
                                                            {{ __('Familias') }}
                                                        </a>
                                                    @endcan
                                                </li>
                                                <li>
                                                    @can('menu.ivas')
                                                        <a class="dropdown-item" href="{{ route('ivas.index') }}">
                                                            {{ __('Ivas') }}
                                                        </a>
                                                    @endcan
                                                </li>
                                                <li>
                                                    @can('menu.minas')
                                                        <a class="dropdown-item" href="{{ route('minas.index') }}">
                                                            {{ __('Minas') }}
                                                        </a>
                                                    @endcan
                                                </li>
                                                <li>
                                                    @can('menu.tipo-de-direcciones')
                                                        <a class="dropdown-item"
                                                            href="{{ route('tipo-de-direcciones.index') }}">
                                                            {{ __('Tipo de Direcciones') }}
                                                        </a>
                                                    @endcan
                                                </li>
                                                <li>
                                                    @can('menu.tipo-de-ingresos')
                                                        <a class="dropdown-item" href="{{ route('tipo-de-ingresos.index') }}">
                                                            {{ __('Tipo de Ingresos') }}
                                                        </a>
                                                    @endcan
                                                </li>
                                                <li>
                                                    @can('menu.unidades')
                                                        <a class="dropdown-item" href="{{ route('unidades.index') }}">
                                                            {{ __('Unidades') }}
                                                        </a>
                                                    @endcan
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            @endcan
                            @can('menu.recursoshumanos')
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white fs-5" href="#"
                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        v-pre>
                                        Recursos Humanos
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        @can('menu.candidatos')
                                            <a class="dropdown-item" href="{{ route('candidatos.index') }}">
                                                {{ __('Candidatos') }}
                                            </a>
                                        @endcan
                                        @can('menu.empleados')
                                            <a class="dropdown-item" href="{{ route('empleados.index') }}">
                                                {{ __('Empleados') }}
                                            </a>
                                        @endcan
                                        @can('menu.empleado-expedientes')
                                            <a class="dropdown-item" href="{{ route('empleado-expedientes.index') }}">
                                                {{ __('Expediente de Empleado') }}
                                            </a>
                                        @endcan
                                        @can('menu.incidencias')
                                            <a class="dropdown-item" href="{{ route('incidencias.index') }}">
                                                {{ __('Incidencias') }}
                                            </a>
                                        @endcan
                                        @can('menu.grupos')
                                            <a class="dropdown-item" href="{{ route('grupos.index') }}">
                                                {{ __('Grupos') }}
                                            </a>
                                        @endcan
                                        @can('menu.paros')
                                            <a class="dropdown-item" href="{{ route('paros.index') }}">
                                                {{ __('Paros') }}
                                            </a>
                                        @endcan
                                        @can('menu.poblacion')
                                            <a class="dropdown-item" href="{{ route('empleados.poblacion') }}">
                                                {{ __('Población') }}
                                            </a>
                                        @endcan
                                        <div class="dropdown-divider"></div>
                                        <li>
                                            <a class="dropdown-item" href="">
                                                {{ __('Configuración') }} &raquo;
                                            </a>
                                            <ul class="submenu dropdown-menu">
                                                @can('menu.puestos')
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('puestos.index') }}">
                                                            {{ __('Puestos') }}
                                                        </a>
                                                    </li>
                                                @endcan
                                                @can('menu.expedientes')
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('expedientes.index') }}">
                                                            {{ __('Documentos de Expedientes') }}
                                                        </a>
                                                    </li>
                                                @endcan
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            @endcan
                            @can('menu.administracion')
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white fs-5"
                                        href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" v-pre>
                                        Administración
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                        @can('menu.usuarios')
                                            <a class="dropdown-item" href="{{ route('usuarios.index') }}">
                                                {{ __('Usuarios') }}
                                            </a>
                                        @endcan
                                        @can('menu.roles')
                                            <a class="dropdown-item" href="{{ route('roles.index') }}">
                                                {{ __('Roles y permisos') }}
                                            </a>
                                        @endcan
                                        <a class="dropdown-item" href="{{ route('accesos.index') }}">
                                            {{ __('Clave de Registro') }}
                                        </a>
                                    </div>
                                </li>
                            @endcan
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white fs-5"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" v-pre>
                                    Archivos
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('archivos.index') }}">
                                        {{ __('Compartir Archivos') }}
                                    </a>
                                </div>
                            </li>
                            @can('menu.recursoshumanos')
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white fs-5" href="#"
                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        v-pre>
                                        Cadena de Suministros
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('productos.index') }}">
                                                {{ __('Productos') }}
                                            </a>
                                            <a class="dropdown-item" href="{{ route('stocks.entradas') }}">
                                                {{ __('Entradas') }}
                                            </a>
                                            <a class="dropdown-item" href="{{ route('stocks.salidas') }}">
                                                {{ __('Salidas') }}
                                            </a>
                                            <a class="dropdown-item" href="{{ route('stocks.resumen') }}">
                                                {{ __('Inventario') }}
                                            </a>
                                            <a class="dropdown-item" href="{{ route('control-gasolineras.index') }}">
                                                {{ __('Control de Gasolineras') }}
                                            </a>
                                            <a class="dropdown-item" href="{{ route('control-gasolineras.graficasGasolinerasRango') }}">
                                                {{ __('Gráficar por Rango') }}
                                            </a>
                                            <a class="dropdown-item" href="{{ route('control-gasolineras.graficasGasolinerasUnidad') }}">
                                                {{ __('Gráficar consumo por Unidad') }}
                                            </a>
                                        <div class="dropdown-divider"></div>
                                        <li>
                                            <a class="dropdown-item" href="">
                                                {{ __('Requisiciones') }} &raquo;
                                            </a>
                                            <ul class="submenu dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('requisiciones.index') }}">
                                                            {{ __('Requisiciones') }}
                                                        </a>
                                                    </li>
                                            </ul>
                                        </li>
                                        <div class="dropdown-divider"></div>
                                        <li>
                                            <a class="dropdown-item" href="">
                                                {{ __('Configuración') }} &raquo;
                                            </a>
                                            <ul class="submenu dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('gasolineras.index') }}">
                                                            {{ __('Gasolineras') }}
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('destinos.index') }}">
                                                            {{ __('Destinos') }}
                                                        </a>
                                                    </li> 
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            @endcan
                    </ul>
                    @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item ">
                                    <a class="nav-link text-white fs-5"
                                        href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white fs-5"
                                        href="{{ route('register') }}">{{ __('Regístrate') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function myFunction() {
            document.getElementById("btn-aceptar").style.visibility = "hidden";
            setTimeout(() => document.getElementById("btn-aceptar").style.visibility = "visible", 3600);
        };
    </script>
    @stack('scripts')
    @livewireScripts
</body>

</html>
