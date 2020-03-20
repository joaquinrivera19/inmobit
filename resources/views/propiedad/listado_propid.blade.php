@extends('layouts.app')

@section('content')

    <!-- Main Content -->
    <section class="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    @if (isset ($infopropietario-> per_apellido))
                        <h1 class="admin-title">
                            Propietario: {{ $infopropietario-> per_apellido}} {{ $infopropietario-> per_nombre}}</h1>
                    @else
                        <h1 class="admin-title">Cliente: {{ $infopropietario-> comer_nombre}}</h1>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">

                    @if ($propiedades->count() == 0)

                        <div class="no-properties">
                            <h1 class="admin-title-big">Todavía no cargó ninguna Propiedad</h1>
                            <p><a href="{{ url('/propiedad/create') }}" class="btn-lg btn btn-blue"><i
                                            class="fa fa-plus-circle"></i>
                                    CARGAR PROPIEDAD</a></p>
                            <br/><br/><br/>
                            <p><b>Antes de poder comenzar a publicar necesitamos asegurarnos que su dirección d
                                    e-mail es
                                    correcta.</b></p>
                            <p>Revise su casilla de correo electrónico y siga las instrucciones del correo de
                                bienvenida
                                para validad su e-mail.</p>
                        </div>

                        <div class="faq-sub hide">
                            <h2 class="admin-title">Preguntas frecuentes</h2>
                            <h3>¿Cómo subir propiedades desde el portal?</h3>
                            <p>1. Inicia sesión en el administrador de Inmobiliaria Villa María.<br/>
                                2. Para ingresar es necesario contar con un usuario y una contraseña que son
                                suministrados
                                cuando...</p>
                        </div>

                    @else

                    <!-- Tabla de propiedades -->
                        <div class="admin-table">
                            <div class="header-table">
                                <div class="row">
                                    <div class="col-xs-5 col-sm-3 col-md-8 col-lg-8">
                                        <div class="visible-sm visible-xs">
                                            <div class="btn-group actions-group">
                                                <button type="button" class="btn btn-drop-white dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    Acciones en grupo <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">Enviar fichas</a></li>
                                                    <li><a href="#">Cambiar estado</a></li>
                                                    {{--<li><a href="#">Cambiar tipo de aviso</a></li>--}}
                                                    <li><a href="#">Exportar</a></li>
                                                    <li><a href="#">Eliminar</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <nav class="hidden-sm hidden-xs">
                                            <ul class="actions-group-buttons">
                                                <li>
                                                    <button type="button" class="btn btn-white btn_form_superior"
                                                            data-toggle="modal"
                                                            data-target="#modal_enviar_fichas_muchos"
                                                            data-form_superior="enviar_fichas">Enviar fichas
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" class="btn btn-white btn_form_superior"
                                                            data-toggle="modal"
                                                            data-target="#modal_cambiar_estados_muchos"
                                                            data-form_superior="cambiar_estados">Cambiar estados
                                                    </button>
                                                </li>
                                                {{--<li><button type="button" class="btn btn-white">Cambiar tipo de aviso</button></li>--}}
                                                <li>
                                                    <button type="button" class="btn btn-white btn_form_superior"
                                                            data-toggle="modal"
                                                            data-target="#modal_eliminar_muchos"
                                                            data-form_superior="eliminar">Eliminar
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" class="btn btn-white btn_form_superior"
                                                            data-toggle="modal"
                                                            data-target="#modal_exportar_muchos"
                                                            data-form_superior="exportar_excel">Exportar Excel
                                                    </button>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <table class="TableAdmin TablePropiedades table table-hover table-compresed table-striped"
                                   id="items_resultado">

                                <div id="busqueda_vacia" style="display: none">

                                    <p> No hay resultados</p>

                                </div>

                                <div id="busqueda_novacia">

                                    @foreach($propiedades as $propiedad)

                                        <tr>
                                            <td class="TableCheckbox">
                                                <input type="checkbox">
                                            </td>
                                            <td class="TableImagen">

                                                @if($propiedad->img)
                                                    <img src="{{asset('uploads/usuario'.$authid.'/propiedad'.$propiedad->prop_id.'/'.$propiedad->img)}}"
                                                         alt="" class="img-table img_prop">
                                                @else

                                                    <img src="{{asset('images/notfound.jpg')}}" alt="" class="img-table img_prop">

                                                @endif

                                            </td>
                                            <td class="TableInfo">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4">
                                                        <h6>Dirección<i>:</i></h6>
                                                        <p>{{ $propiedad->prop_direccion }} <i>-</i><br/>
                                                            {{--{{ $propiedad->loc_nombre }} <i>-</i><br/>--}}
                                                            <b>ID: {{ $propiedad->pub_id }}</b></p>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                                        <h6>Operación <i>:</i></h6>
                                                        <p><b>{{ $propiedad->tipoinmu_nombre }}</b>
                                                            <i>-</i></br>{{ $propiedad->tipopera_nombre }}</p>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                                        <h6>Precio<i>:</i></h6>
                                                        <p>${{ $propiedad->prop_valor }}
                                                            <i>-</i><br/><b>Comisión:</b> {{ $propiedad->prop_comision }}
                                                            %
                                                        </p>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                                        <h6>Estado/Tipo de aviso<i>:</i></h6>
                                                        <p>Estado: <b>{{ $propiedad->est_nombre }}</b> <i>-</i><br/>
                                                            Tipo de aviso: <b>{{ $propiedad->aviso_nombre }}</b>
                                                            <i>-</i><br/>
                                                            Visitas: <b>8</b></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="TableActions">
                                                <div class="hidden-sm hidden-xs">
                                                    <div class="btn-group" role="group">
                                                        <button type="button" class="btn btn-white"
                                                                data-toggle="modal" data-target="#modal_tipo_aviso"
                                                                data-pub_id="{{ $propiedad->pub_id }}"
                                                                data-aviso_id="{{ $propiedad->aviso_id }}">Destacar Home
                                                        </button>
                                                        <a href="{{ url('getconsultaweb/'.$propiedad->pub_id) }}"
                                                           type="button" class="btn btn-white" style="padding-top: 12px"
                                                           target="_blank">Consultas
                                                        </a>

                                                        <button type="button" class="btn btn-white" data-toggle="modal"
                                                                data-target="#modal_enviar_ficha"
                                                                data-pub_id="{{ $propiedad->pub_id }}">Enviar ficha
                                                        </button>

                                                        <button type="button" class="btn btn-white" data-toggle="modal"
                                                                data-target="#modal_eliminar"
                                                                data-pub_id="{{ $propiedad->pub_id }}">Eliminar
                                                        </button>
                                                    </div>
                                                    <div class="btn-group" role="group">
                                                        <button type="button" class="btn btn-white"
                                                                data-toggle="modal" data-target="#modal_estado"
                                                                data-pub_id="{{ $propiedad->pub_id }}"
                                                                data-est_id="{{ $propiedad->est_id }}">Cambiar Estado
                                                            Web
                                                        </button>
                                                        <a href="{{ url('getexportacionpropiedadid_pdf/'.$propiedad->pub_id) }}"
                                                           type="button" class="btn btn-white" style="padding-top: 12px"
                                                           target="_blank">Exporta PDF
                                                        </a>
                                                        <a href="{{ url('/propiedad/'.$propiedad->pub_id.'/edit') }}"
                                                           type="button" class="btn btn-white" style="padding: 8px">Ver
                                                            o Editar
                                                        </a>
                                                        <button type="button" class="btn btn-white" data-toggle="modal"
                                                                data-target="#modal-ads-public">Publicar Portales
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </div>

                            </table>
                        </div>

                    @endif

                </div>
            </div>
        </div>
    </section>

    @if ($propiedades->count() != 0)

        @include('propiedad.modal_aviso')
        @include('propiedad.modal_estado')
        @include('propiedad.modal_publicar')
        @include('propiedad.modal_eliminar')
        @include('propiedad.modal_enviar_ficha')

        @include('propiedad.modal_enviar_fichas_muchos')
        @include('propiedad.modal_cambiar_estados_muchos')
        @include('propiedad.modal_eliminar_muchos')
        @include('propiedad.modal_exportar_muchos')

    @endif

    {{--@include('propiedad.modal_mail)--}}


@endsection

@section('scripts')

    <script>

        $('#modal_eliminar').on('show.bs.modal', function (e) {

            var pub_id = $(e.relatedTarget).data('pub_id');

            var modal = $(this);
            modal.find('.modal-body .pub_id').val(pub_id);
            $(".idpub").text(pub_id);

            $("#idpublicacion").attr('action', pub_id);

        });

        $('#modal_tipo_aviso').on('show.bs.modal', function (e) {

            var pub_id = $(e.relatedTarget).data('pub_id');
            var aviso_id = $(e.relatedTarget).data('aviso_id');

            if (aviso_id == 1) {

                $(".aviso-todos").removeClass("active");
                $(".aviso1").addClass("active");

            } else if (aviso_id == 2) {

                $(".aviso-todos").removeClass("active");
                $(".aviso2").addClass("active");

            } else {

                $(".aviso-todos").removeClass("active");
                $(".aviso3").addClass("active");
            }

            var modal = $(this);
            modal.find('.modal-body .pub_id input').val(pub_id);

            $("#idpublicacion").attr('action', pub_id);

        });

        $('#modal_estado').on('show.bs.modal', function (e) {

            var pub_id = $(e.relatedTarget).data('pub_id');
            var est_id = $(e.relatedTarget).data('est_id');

            if (est_id == 1) {

                $(".estado-todos").removeClass("active");
                $(".estado1").addClass("active");

            } else if (est_id == 2) {

                $(".estado-todos").removeClass("active");
                $(".estado2").addClass("active");

            } else if (est_id == 3) {

                $(".estado-todos").removeClass("active");
                $(".estado3").addClass("active");

            } else if (est_id == 4) {

                $(".estado-todos").removeClass("active");
                $(".estado4").addClass("active");

            } else {

                $(".estado-todos").removeClass("active");
                $(".estado4").addClass("active");
            }

            var modal = $(this);
            modal.find('.modal-body .pub_id input').val(pub_id);

            $("#idpublicacion").attr('action', pub_id);

        });

        $('#modal_enviar_ficha').on('show.bs.modal', function (e) {

            $(".modal_mail_form").attr('action', 'propiedad');

            var web = 'www.inmobit.com/propiedad/';
            var pub_id = $(e.relatedTarget).data('pub_id');
            var web_completa = web + pub_id;

            var modal = $(this);
            modal.find('.modal-body .pub_id input').val(web_completa);

        });

    </script>

@endsection