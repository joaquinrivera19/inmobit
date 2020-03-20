@extends('layouts.app')

@section('content')

    <section class="admin-content">
        <div class="container">
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
                                                    <li><a href="#">Cambiar Estado</a></li>
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

                                    <div class="col-xs-6 col-sm-5 col-md-4 col-lg-4">
                                        <div class="search-table">
                                            <div class="input-group">
                                                <input type="text" class="form-control buscador"
                                                       placeholder="Buscar por nombre, mail o teléfono">
                                                <span class="input-group-btn">
												<button class="btn btn-blue btn_buscar" type="button"><i class="fa fa-search"></i></button>
											  </span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-4 col-md-12 col-lg-12">
                                        <div class="form-inline filters">
                                            <label class="form-group-label hidden-xs hidden-sm">Filtros:</label>
                                            <button class="toggle-menu btn btn-white menu-left visible-xs visible-sm">
                                                Filtros
                                            </button>
                                            <div class="desktop-filters hidden-xs hidden-sm">
                                                <div class="form-group">
                                                    {!! Form::select('est_id',$estado, null, ['class' => 'form-control width-limit','id' => 'est_id']) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::select('tipopera_id',$tipo_operacion, null, ['class' => 'form-control width-limit','id' => 'tipopera_id']) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::select('tipoinmu_id',$tipo_inmueble, null, ['class' => 'form-control width-limit','id' => 'tipoinmu_id']) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::select('hab_id',$num_dormitorio, null, ['class' => 'form-control width-limit', 'id' => 'hab_id']) !!}
                                                </div>

                                                {{--<div class="form-group">
                                                    <select class="form-control" id="ubicacion">
                                                        <option>Ubicación</option>
                                                        <option>Villa María</option>
                                                        <option>Villa Nueva</option>
                                                    </select>
                                                </div>
                                                <div class="form-group price">
                                                    <div class="btn-group">
                                                        <button class="btn btn-white dropdown-toggle" type="button"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                            Precio <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <div class="form-inline">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control"
                                                                           id="precio-desde" placeholder="Desde"/>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control"
                                                                           id="precio-hasta" placeholder="Hasta"/>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" class="btn btn-blue"
                                                                           value="Filtrar"/>
                                                                </div>
                                                            </div>
                                                        </ul>
                                                    </div>
                                                </div>--}}

                                                <button type="button" class="btn btn-link" id="quitar_filtros">
                                                    Quitar <span>Filtros</span>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="form-inline filters hidden-xs" style="float: right;">
                                            <div class="desktop-range-dates">
                                                <div class="form-group">
                                                    <select class="form-control" id="ordenar" style="margin-right: 0px;">
                                                        <option value="0">Ordenar por Fecha</option>
                                                        <option value="1">Menor Precio</option>
                                                        <option value="2">Mayor Precio</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>


                                    </div>


                                </div>
                            </div>

                            {!! Form::open(array('url' => 'propiedad','method' => 'post', 'id' => 'form_superior')) !!}

                            <table class="TableAdmin TablePropiedades table table-hover table-compresed table-striped"
                                   id="items_resultado">

                                <div id="busqueda_vacia" style="display: none">

                                    <p> No hay resultados</p>

                                </div>

                                <div id="busqueda_novacia">

                                    @foreach($propiedades as $propiedad)

                                        <tr>
                                            <td class="TableCheckbox">
                                                <input name="check[{{ $propiedad->pub_id }}]" type="checkbox" data-id="{{ $propiedad->pub_id }}">
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

                            {!! Form::close() !!}

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

    <script type="text/javascript">

        $(document).ready(function () {

            $('#quitar_filtros').click(function () {

                $('#est_id').val("");
                $('#tipopera_id').val("");
                $('#tipoinmu_id').val("");
                $('#hab_id').val("");

                buscar_datos();

            });

            $('#est_id').on('change', function () {
                buscar_datos();
            });

            $('#tipopera_id').on('change', function () {
                buscar_datos();
            });

            $('#tipoinmu_id').on('change', function () {
                buscar_datos();
            });

            $('#hab_id').on('change', function () {
                buscar_datos();
            });

            $('#btn_buscar').click(function () {
                buscar_datos();
            });

            $('.buscador').keyup(function() {
                buscar_datos();
            });

            $("#ordenar").change(function(){
                buscar_datos()
            });


            function buscar_datos() {

                var est_id = $('#est_id').val();
                var tipopera_id = $('#tipopera_id').val();
                var tipoinmu_id = $('#tipoinmu_id').val();
                var hab_id = $('#hab_id').val();
                var buscador = $('.buscador').val();

                var select_ordenar = $('select[id=ordenar]').val();

                if (!est_id) {
                    est_id = 0
                }

                if (!tipopera_id) {
                    tipopera_id = 0
                }

                if (!tipoinmu_id) {
                    tipoinmu_id = 0
                }

                if (!hab_id) {
                    hab_id = 0
                }

                if (!buscador) {
                    buscador = 0
                }

                var html = "";


                $.ajax({
                    url: '{{ URL::to("/filtropublicacion/") }}/' + est_id + '/' + tipopera_id + '/' + tipoinmu_id + '/' + hab_id + '/' + buscador + '/' + select_ordenar,
                    type: 'GET',
                    dataType: 'json',
                    cache: false,
                    beforeSend: function () {
                        //$("#gif").html("<p align='center'><img src='{{asset('assets/ajax-loader.gif')}}' /> Cargando...</p>");
                    }

                }).done(function (data) {

                    //$("#gif").empty()

                    $("#items_resultado").empty();

                    if (data.data != 0) {

                        $('#busqueda_vacia').hide();
                        $('#busqueda_novacia').show();

                        $.each(data.data, function (i, val) {

                            $url_consulta = '{{ url("/getconsultaweb") }}/' + data.data[i].pub_id ;

                            if (data.data[i].img == null)
                            {
                                $url = '{{ url("/images/notfound.jpg") }}';

                            } else {

                                $url = '{{ url("/uploads") }}/usuario' + data.data[i].user_id + '/propiedad' + data.data[i].prop_id + '/' + data.data[i].img;
                            }

                            html += "<tr>";
                            html += "<td class='TableCheckbox'><input name='check[" + data.data[i].pub_id + "]' type='checkbox' data-id=" + data.data[i].pub_id + "></td>";
                            html += "<td class='TableImagen'><img src='" + $url + "' alt='' class='img-table img_prop'></td>";
                            html += "<td class='TableInfo'>" +
                                "<div class='row'>" +
                                "<div class='col-xs-12 col-sm-3 col-md-3 col-lg-4'>" +
                                "<h6>Dirección<i>:</i></h6>" +
                                "<p>" + data.data[i].prop_direccion + "<i>-</i><br/>" +
                                "" + data.data[i].loc_nombre + "<i>-</i><br/>" +
                                "<b>ID: " + data.data[i].pub_id + "</b></p>" +
                                "</div>" +
                                "<div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>" +
                                "<h6>Operación <i>:</i></h6>" +
                                "<p><b>" + data.data[i].tipopera_nombre + "</b>" +
                                "<i>-</i></br>" + data.data[i].tipoinmu_nombre + "</p>" +
                                "</div>" +
                                "<div class='col-xs-12 col-sm-2 col-md-2 col-lg-2'>" +
                                "<h6>Precio<i>:</i></h6>" +
                                "<p>$" + data.data[i].prop_valor + "" +
                                "<i>-</i><br/><b>Comisión:</b> " + data.data[i].prop_comision + "%</p>" +
                                "</div>" +
                                "<div class='col-xs-12 col-sm-4 col-md-4 col-lg-3'>" +
                                "<h6>Estado/Tipo de aviso<i>:</i></h6>" +
                                "<p>Estado: <b>" + data.data[i].est_nombre + "</b> <i>-</i><br/>" +
                                "Tipo de aviso: <b>" + data.data[i].aviso_nombre + "</b> <i>-</i><br/>" +
                                "Visitas: <b>8</b></p>" +
                                "</div>" +
                                "</div>" +
                                "</td>";
                            html += "<td class='TableActions'><div class='hidden-sm hidden-xs'>" +
                                "<div class='btn-group' role='group'>" +
                                "<button type='button' class='btn btn-white' " +
                                "data-toggle='modal' data-target='#modal_tipo_aviso' " +
                                "data-pub_id=" + data.data[i].pub_id + " " +
                                "data-aviso_id=" + data.data[i].aviso_id + ">Cambiar tipo aviso " +
                                "</button>";
                                html += "<a href='" + $url_consulta + "' type='button' class='btn btn-white'";
                                html += "style='padding-top: 12px;' target='_blank'>Consultas</a>";
                                html += "<button type='button' class='btn btn-white' data-toggle='modal' " +
                                "data-target='#modal_enviar_ficha' data-pub_id=" + data.data[i].pub_id + ">Enviar ficha " +
                                "</button>" +
                                "<button type='button' class='btn btn-white' data-toggle='modal' " +
                                "data-target='#modal_eliminar' data-pub_id=" + data.data[i].pub_id + ">Eliminar" +
                                "</button>" +
                                "</div>" +
                                "<div class='btn-group' role='group'>" +
                                "<button type='button' class='btn btn-white' " +
                                "data-toggle='modal' data-target='#modal_estado' " +
                                "data-pub_id=" + data.data[i].pub_id + " " +
                                "data-est_id=" + data.data[i].est_id + ">Cambiar estado" +
                                "</button>" +
                                "<button type='button' class='btn btn-white'>Exportar</button>" +
                                "<button type='button' class='btn btn-white'>Ver o editar</button>" +
                                "<button type='button' class='btn btn-white' data-toggle='modal' " +
                                "data-target='#modal-ads-public'>Publicar " +
                                "</button>" +
                                "</div>" +
                                "</div></td>";
                            html += "</tr>";

                        });

                        $("#items_resultado").html(html);

                    } else {

                        $('#busqueda_vacia').show();
                        $('#busqueda_novacia').hide();

                    }

                    valor_chek();

                });



            }

        })

    </script>

    <script>


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

