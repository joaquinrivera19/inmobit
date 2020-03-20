<body class="admin">
<div class="mask-small"></div>
<header>

    <section class="head" id="header">
        <div class="container">
            <nav class="navbar admin-navbar">
                <div class="navbar-header">
                    <a href="index.php" class="logo">
                        <img src="{{ asset('images/logo.png') }}" alt="Inmuebles Villa María"
                             title="Inmuebles Villa María"/>
                    </a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#admin-nav" aria-expanded="false">
                        <span class="mobile-only"><i class="fa fa-bars"></i></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="admin-nav">
                    <ul class="nav navbar-nav">

                        @if( \App\Entities\Utilities::getTipoUsuario() == 1)

                            <li class="nav-admin-mobile"><a href="{{ url('/cliente') }}">Cargar Cliente</a></li>
                            <li class="nav-admin-mobile"><a href="{{ url('/consulta') }}">Consultas</a></li>
                            <li class="nav-admin-mobile"><a href="{{ url('/cliente') }}">Clientes</a></li>

                            <li><a href="{{ url('/perfil') }}">Perfil</a></li>
                            <li><a href="{{ url('/password') }}">Cambiar contraseña</a></li>

                        @else

                            <li class="nav-admin-mobile"><a href="{{ url('/propiedad/create') }}">Cargar Propiedad</a></li>
                            <li class="nav-admin-mobile"><a href="{{ url('/propiedad') }}">Mis Propiedades</a></li>
                            {{--<li class="nav-admin-mobile"><a href="red-ivm.php">Red IVM</a></li>--}}
                            <li class="nav-admin-mobile"><a href="{{ url('/consulta') }}">Consultas</a></li>
                            <li class="nav-admin-mobile"><a href="{{ url('/propietario') }}">Propietarios</a></li>
                            <li class="nav-admin-mobile"><a href="{{ url('/tasacion') }}">Tasaciones</a></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true" aria-expanded="false">Soporte <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/pregunta_frecuente') }}">Preguntas frecuentes</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#modal-query">Enviar una consulta</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true" aria-expanded="false">Utiles <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/utiles/contratos') }}">Contratos</a></li>
                                    <li><a href="{{ url('/utiles/fichas_tasaciones') }}">Tasaciones</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true" aria-expanded="false">Mi cuenta <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/perfil') }}">Perfil</a></li>
                                    <li><a href="{{ url('/password') }}">Cambiar contraseña</a></li>
                                    <li><a href="mi-cuenta.php">Estado de cuenta</a></li>
                                </ul>
                            </li>

                        @endif


                        <li><a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <nav class="navbar-sections">
            <div class="container">
                <ul>

                    @if( \App\Entities\Utilities::getTipoUsuario() == 1)

                        <li><a href="{{ url('/consulta') }}">CONSULTAS</a></li>
                        <li><a href="{{ url('/cliente') }}">CLIENTES</a></li>

                        <li class="btn-blue pull-right">
                            <button type="button" class="btn btn-blue" data-toggle="modal"
                                    data-target="#modal_cliente_create" style="right: 0px;font-weight: normal;
                                    font-size: 14px; height: 44px;margin-right: 15px;"><i class="fa fa-plus-circle"></i> CARGAR CLIENTE
                            </button>
                        </li>

                    @else

                        <li><a href="{{ url('/propiedad') }}">MIS PROPIEDADES</a></li>
                        {{--<li><a href="red-ivm.php">RED IVM</a></li>--}}
                        <li><a href="{{ url('/consulta') }}">CONSULTAS</a></li>
                        <li><a href="{{ url('/propietario') }}">PROPIETARIOS</a></li>
                        <li><a href="{{ url('/tasacion') }}">TASACIONES</a></li>


                        <li class="btn-blue pull-right"><a href="{{ url('/propiedad/create') }}"><i
                                        class="fa fa-plus-circle"></i> CARGAR PROPIEDAD</a></li>

                    @endif

                </ul>
            </div>
        </nav>
    </section>

</header>