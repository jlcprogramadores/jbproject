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
    
    <!-- Favicon -->
    <link rel="shortcut icon"  href="{{ asset('images/favicon_blanco.jpg') }}">
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- css -->
    @yield('css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/JB.png') }}" style="width: 70px; height: 70px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Finanzas
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"  href="{{ url('/') }}">
                                    {{ __('Egresos') }}
                                </a>  
                                <a class="dropdown-item" href="{{ url('/') }}"">
                                    {{ __('Ingresos') }}
                                </a> 
                                <a class="dropdown-item" href="{{ url('/') }}"">
                                    {{ __('Gráficas') }}
                                </a> 
                                
                                </form>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Recursos Humanos
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"  href="{{ url('/') }}"">
                                    {{ __('Plantilla') }}
                                </a>  
                                <a class="dropdown-item" href="{{ url('/') }}"">
                                    {{ __('Currículums') }}
                                </a> 
                                
                                </form>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Administración
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"  href="{{ route('familias.index') }}">
                                    {{ __('Familias') }}
                                </a>  
                                <a class="dropdown-item" href="{{ route('categorias-familias.index') }}">
                                    {{ __('Categorías Familias') }}
                                </a> 
                                <a class="dropdown-item" href="{{ route('ivas.index') }}">
                                    {{ __('Ivas') }}
                                </a> 
                                <a class="dropdown-item" href="{{ route('unidades.index') }}">
                                    {{ __('Unidades') }}
                                </a> 
                                <a class="dropdown-item" href="{{ route('proyectos.index') }}">
                                    {{ __('Proyectos') }}
                                </a> 
                                <a class="dropdown-item" href="{{ route('clientes.index') }}">
                                    {{ __('Clientes') }}
                                </a> 
                                <a class="dropdown-item" href="{{ route('tipo-de-direcciones.index') }}">
                                    {{ __('Tipo de Direcciones') }}
                                </a> 
                                <a class="dropdown-item" href="{{ route('salidas.index') }}">
                                    {{ __('Salidas') }}
                                </a> 
                                <a class="dropdown-item" href="{{ route('facturas.index') }}">
                                    {{ __('Facturas') }}
                                </a> 
                                <a class="dropdown-item" href="{{ route('tipo-de-ingresos.index') }}">
                                    {{ __('Tipo de Ingresos') }}
                                </a>     
                                <a class="dropdown-item" href="{{ route('categorias-de-entradas.index') }}">
                                    {{ __('Categorías de entrada') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('finanzas.index') }}">
                                    {{ __('Finanzas') }}
                                </a>  
                                <a class="dropdown-item" href="{{ route('proveedores.index') }}">
                                    {{ __('Proveedores') }}
                                </a>  
                                <a class="dropdown-item" href="{{ route('cuentas-bancarias.index') }}">
                                    {{ __('Cuentas Bancarias') }}
                                </a>    
                                <a class="dropdown-item" href="{{ route('entradas.index') }}">
                                    {{ __('Entradas') }}
                                </a>     
                                </form>
                            </div>
                        </li>
                    </ul>
                    
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item ">
                                    <a class="nav-link text-white fs-5" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white fs-5" href="{{ route('register') }}">{{ __('Regístrate') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    @stack('scripts')
</body>
</html>
