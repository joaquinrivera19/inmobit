@extends('layouts.app')

@section('content')

    <!-- Main Content -->
    <section class="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">

                @if ($consultas->count() == 0)

                    <!-- Cartel "no hay propiedades" -->
                        <div class="no-properties">
                            <h1 class="admin-title-big">Todavía no recibió ninguna consulta.</h1>
                            <p>
                                <button type="button" class="btn-lg btn btn-blue" data-toggle="modal"
                                        data-target="#modal_consulta_create"><i
                                            class="fa fa-plus-circle"></i>
                                    CARGAR CONSULTA
                                </button>
                            </p>
                        </div>
                        <!-- fin cartel "no hay propiedades" -->

                @else

                    <!-- Tabla de propiedades -->
                        <div class="admin-table">
                            <div class="header-table header-table-propietarios">
                                <div class="row">
                                    <div class="col-xs-12 hidden-sm hidden-md hidden-lg">
                                        <button type="button" class="btn btn-blue tasacion-btn-mobile"
                                                data-toggle="modal"
                                                data-target="#modal_consulta_create">CARGAR CONSULTA
                                        </button>
                                    </div>
                                    <div class="col-xs-6 col-sm-7 col-md-8 col-lg-8">
                                        <div class="visible-xs">
                                            <div class="btn-group actions-group">
                                                <button type="button" class="btn btn-drop-white dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    Acciones en grupo <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">Eliminar</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <nav class="hidden-xs">
                                            <ul class="actions-group-buttons">
                                                <li>
                                                    <button type="button" class="btn btn-blue" data-toggle="modal"
                                                            data-target="#modal_consulta_create">CARGAR CONSULTA
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" class="btn btn-white btn_form_superior" data-toggle="modal"
                                                            data-target="#modal_eliminar_muchos"
                                                            data-form_superior="eliminar">Eliminar
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
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-inline filters hidden-xs">
                                            <div class="desktop-range-dates">
                                                <div class="form-group">
                                                    <label><b>Filtrar por fecha: </b> Desde:</label>
                                                    <input type="date" id="fecha_desde"
                                                           class="form-control fecha_desde"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Hasta:</label>
                                                    <input type="date" id="fecha_hasta" class="form-control fecha_hasta"
                                                           min=""/>
                                                </div>
                                                <button class="btn btn-primary btn_campania btn_buscar" type="button"
                                                        data-est_id="0">
                                                    Buscar
                                                </button>
                                            </div>
                                        </div>
                                        <div class="form-inline filters filters-xs visible-xs">
                                            <div class="form-group dates">
                                                <div class="btn-group">
                                                    <button class="btn btn-white dropdown-toggle" type="button"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                        Filtrar fechas <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <div class="form-group">
                                                            <input type="date" class="form-control" id="fecha-desde2"
                                                                   placeholder="Desde"/>
                                                            <input type="date" class="form-control" id="fecha-hasta2"
                                                                   placeholder="Hasta"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <input class="btn btn-blue" value="Filtrar"/>
                                                        </div>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-inline filters hidden-xs" style="float: right;">
                                            <div class="desktop-range-dates">
                                                <div class="form-group">
                                                    <select class="form-control" id="ordenar" style="margin-right: 0px;">
                                                        <option value="0">Ordenar por fecha</option>
                                                        <option value="1">Mas recientes</option>
                                                        <option value="2">Mas antiguas</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            {!! Form::open(array('url' => 'consulta','method' => 'post', 'id' => 'form_superior')) !!}

                            <table class="TableAdmin TablePropietarios table table-hover table-compresed table-striped"
                                   id="items_resultado">

                                <div id="busqueda_vacia" style="display: none">

                                    <p> No hay resultados</p>

                                </div>

                                <div id="busqueda_novacia">

                                    @foreach($consultas as $consulta)
                                        <tr>
                                            <td class="TableCheckbox">
                                                <input name="check[{{ $consulta->idconsulta }}]" type="checkbox" data-id="{{ $consulta->idconsulta }}">
                                            </td>
                                            <td class="TableInfo">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                                        <h6>Fecha<i>:</i></h6>
                                                        <p>
                                                            <b>{{ $consulta->fecha_carga }}</b><br>{{ $consulta->hora_carga }}
                                                            hs</p>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-3">
                                                        <h6>Datos interesado <i>:</i></h6>
                                                        <p><b>{{ $consulta->apellido }}
                                                                - {{ $consulta->nombre }}</b><br>{{ $consulta->tel_fijo }}
                                                            / {{ $consulta->tel_cel }}<br>{{ $consulta->email }}</p>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-7">
                                                        <h6>Consulta<i>:</i></h6>
                                                        <p>{{ $consulta->mensaje }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="TableActions">
                                                <div class="hidden-sm hidden-xs">
                                                    <div class="btn-group" role="group">
                                                        <button type="button" data-idconsulta="{!! $consulta->idconsulta !!}"
                                                                data-email="{!! $consulta->email !!}"
                                                                class="btn btn-white" data-toggle="modal"
                                                                data-target="#modal_mail">Enviar mail
                                                        </button>

                                                        <button type="button"
                                                                data-per_apellido="{!! $consulta->apellido !!}"
                                                                data-per_nombre="{!! $consulta->nombre !!}"
                                                                data-per_dni="{!! $consulta->dni !!}"
                                                                data-per_email="{!! $consulta->email !!}"
                                                                data-per_tel_fijo="{!! $consulta->tel_fijo !!}"
                                                                data-per_tel_cel="{!! $consulta->tel_cel !!}"
                                                                data-per_mensaje="{!! $consulta->mensaje !!}"
                                                                data-per_fecha_carga="{!! $consulta->fecha_carga !!}"
                                                                data-per_hora_carga="{!! $consulta->hora_carga !!}"
                                                                data-per_domicilio="{!! $consulta->domicilio !!}"
                                                                data-per_id="{!! $consulta->id !!}"
                                                                data-idconsulta="{!! $consulta->idconsulta !!}"
                                                                data-cont_id="{!! $consulta->cont_id !!}"
                                                                class="btn btn-white" data-toggle="modal"
                                                                data-target="#modal_consulta_eliminar">Eliminar
                                                        </button>

                                                    </div>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ url('getexportacionconsultaid_pdf/'.$consulta->idconsulta) }}"
                                                           type="button" class="btn btn-white" style="padding-top: 12px" target="_blank">Exporta PDF
                                                        </a>

                                                        <button type="button"
                                                                data-per_apellido="{!! $consulta->apellido !!}"
                                                                data-per_nombre="{!! $consulta->nombre !!}"
                                                                data-per_dni="{!! $consulta->dni !!}"
                                                                data-per_email="{!! $consulta->email !!}"
                                                                data-per_tel_fijo="{!! $consulta->tel_fijo !!}"
                                                                data-per_tel_cel="{!! $consulta->tel_cel !!}"
                                                                data-per_mensaje="{!! $consulta->mensaje !!}"
                                                                data-per_fecha_carga="{!! $consulta->fecha_carga !!}"
                                                                data-per_hora_carga="{!! $consulta->hora_carga !!}"
                                                                data-per_domicilio="{!! $consulta->domicilio !!}"
                                                                data-per_id="{!! $consulta->id !!}"
                                                                data-idconsulta="{!! $consulta->idconsulta !!}"
                                                                data-cont_id="{!! $consulta->cont_id !!}"
                                                                class="btn btn-white" data-toggle="modal"
                                                                data-target="#modal_consulta_edit">Editar
                                                        </button>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </div>

                            </table>

                            {!! Form::close() !!}

                            {{ $consultas->links() }}

                        </div>

                    @endif

                </div>
            </div>
        </div>

    </section>

    @include('cliente.modal_create')

    @include('consulta.modal_create')

    @if ($consultas->count() != 0)

        @include('consulta.modal_edit')
        @include('consulta.modal_eliminar')
        @include('modal_mail')

        @include('consulta.modal_eliminar_muchos')

    @endif

@endsection

@section('scripts')

    <script type="text/javascript" src="{{ asset('js/validate_consulta.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function () {

            $('#quitar_filtros').click(function () {

                $('#est_id').val("");
                $('#tipopera_id').val("");

            })
        });


        $(document).ready(function () {

            $(".fecha_desde").change(function () {
                var fecha_desde = $('.fecha_desde').val();
                $('.fecha_hasta').attr("min", fecha_desde);
            });


            $('.btn_buscar').click(function () {
                buscar_datos();
            });

            $('.buscador').keyup(function() {
                buscar_datos();
            });

            $("#ordenar").change(function(){
                buscar_datos()
            });


            function buscar_datos() {

                var fecha_desde = $('.fecha_desde').val();
                var fecha_hasta = $('.fecha_hasta').val();
                var buscador = $('.buscador').val();

                var select_ordenar = $('select[id=ordenar]').val();

                if (!fecha_desde) {
                    fecha_desde = 0
                }

                if (!fecha_hasta) {
                    fecha_hasta = 0
                }

                if (!buscador) {
                    buscador = 0
                }

                var html = "";


                $.ajax({
                    url: '{{ URL::to("/filtroconsulta/") }}/' + fecha_desde + '/' + fecha_hasta + '/' + buscador + '/' + select_ordenar,
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

                            //console.log(data.data[i].fecha_carga + data.data[i].dni);

                            $url = '{{ URL::to("/getexportacionconsultaid_pdf/") }}/' + data.data[i].idconsulta;

                            html += "<tr>";
                            html += "<td class='TableCheckbox'><input name='check[" + data.data[i].idconsulta + "]' type='checkbox' data-id=" + data.data[i].idconsulta + "></td>";
                            html += "<td class='TableInfo'>" +
                                "<div class='row'>" +
                                "<div class='col-xs-12 col-sm-2 col-md-2 col-lg-2'>" +
                                "<h6>Fecha<i>:</i></h6>" +
                                "<p><b>" + data.data[i].fecha_carga + "</b><br>" + data.data[i].hora_carga + " hs</p>" +
                                "</div>" +
                                "<div class='col-xs-12 col-sm-2 col-md-2 col-lg-3'>" +
                                "<h6>Datos interesado <i>:</i></h6>" +
                                "<p><b>" + data.data[i].apellido + " - " + data.data[i].nombre + "</b><br>" + data.data[i].tel_fijo + " / " + data.data[i].tel_cel + "<br>" + data.data[i].email + "</p>" +
                                "</div>" +
                                "<div class='col-xs-12 col-sm-3 col-md-3 col-lg-7'>" +
                                "<h6>Consulta<i>:</i></h6>" +
                                "<p>" + data.data[i].mensaje + "</p>" +
                                "</div>" +
                                "</div>" +
                                "</td>";
                            html += "<td class='TableActions'>" +
                                "<div class='hidden-sm hidden-xs'>" +
                                "<div class='btn-group' role='group'>" +
                                "<button type='button' data-idconsulta='" + data.data[i].idconsulta + "' data-email='" + data.data[i].email + "' class='btn btn-white' data-toggle='modal' data-target='#modal_mail'>Enviar mail </button>" +
                                "<button type='button' " +
                                " data-per_apellido=" + data.data[i].apellido + " " +
                                " data-per_nombre=" + data.data[i].nombre + " " +
                                " data-per_dni=" + data.data[i].dni + " " +
                                " data-per_email=" + data.data[i].email + " " +
                                " data-per_tel_fijo=" + data.data[i].tel_fijo + " " +
                                " data-per_tel_cel=" + data.data[i].tel_cel + " " +
                                " data-per_mensaje=" + data.data[i].mensaje + " " +
                                " data-per_fecha_carga=" + data.data[i].fecha_carga + " " +
                                " data-per_hora_carga=" + data.data[i].hora_carga + " " +
                                " data-per_domicilio=" + data.data[i].domicilio + " " +
                                " data-per_id=" + data.data[i].id + " " +
                                " data-idconsulta=" + data.data[i].idconsulta + " " +
                                " data-cont_id=" + data.data[i].cont_id + " " +
                                " class='btn btn-white' data-toggle='modal' " +
                                " data-target='#modal_consulta_eliminar'>Eliminar</button> " +
                                "</div> " +
                                "<div class='btn-group' role='group'> " +
                                "<a href='" + $url + "' type='button' class='btn btn-white' style='padding-top: 12px;' target='_blank'>Exporta PDF</a>" +
                                "<button type='button' " +
                                " data-per_apellido=" + data.data[i].apellido + " " +
                                " data-per_nombre=" + data.data[i].nombre + " " +
                                " data-per_dni=" + data.data[i].dni + " " +
                                " data-per_email=" + data.data[i].email + " " +
                                " data-per_tel_fijo=" + data.data[i].tel_fijo + " " +
                                " data-per_tel_cel=" + data.data[i].tel_cel + " " +
                                " data-per_mensaje=" + data.data[i].mensaje + " " +
                                " data-per_fecha_carga=" + data.data[i].fecha_carga + " " +
                                " data-per_hora_carga=" + data.data[i].hora_carga + " " +
                                " data-per_domicilio=" + data.data[i].domicilio + " " +
                                " data-per_id=" + data.data[i].id + " " +
                                " data-idconsulta=" + data.data[i].idconsulta + " " +
                                " data-cont_id=" + data.data[i].cont_id + " " +
                                " class='btn btn-white' data-toggle='modal' " +
                                " data-target='#modal_consulta_edit'>Editar </button> " +
                                "</div>" +
                                "</div>" +
                                "</td>";
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

        //Inicia el modal de eliminar

        $('#modal_consulta_eliminar').on('show.bs.modal', function (e) {

            var per_id = $(e.relatedTarget).data('per_id');
            var per_apellido = $(e.relatedTarget).data('per_apellido');
            var per_nombre = $(e.relatedTarget).data('per_nombre');
            var per_email = $(e.relatedTarget).data('per_email');
            var per_tel_fijo = $(e.relatedTarget).data('per_tel_fijo');
            var per_tel_cel = $(e.relatedTarget).data('per_tel_cel');
            var per_mensaje = $(e.relatedTarget).data('per_mensaje');
            var per_fecha_carga = $(e.relatedTarget).data('per_fecha_carga');
            var per_hora_carga = $(e.relatedTarget).data('per_hora_carga');
            var per_domicilio = $(e.relatedTarget).data('per_domicilio');
            var per_dni = $(e.relatedTarget).data('per_dni');
            var idconsulta = $(e.relatedTarget).data('idconsulta');
            var cont_id = $(e.relatedTarget).data('cont_id');

            var modal = $(this);
            modal.find('.modal-body .per_id input').val(per_id);
            modal.find('.modal-body .per_apellido input').val(per_apellido);
            modal.find('.modal-body .per_nombre input').val(per_nombre);
            modal.find('.modal-body .per_email input').val(per_email);
            modal.find('.modal-body .per_tel_fijo input').val(per_tel_fijo);
            modal.find('.modal-body .per_tel_cel input').val(per_tel_cel);
            modal.find('.modal-body .per_mensaje textarea').val(per_mensaje);
            modal.find('.modal-body .per_fecha_carga input').val(per_fecha_carga);
            modal.find('.modal-body .per_hora_carga input').val(per_hora_carga);
            modal.find('.modal-body .per_domicilio input').val(per_domicilio);
            modal.find('.modal-body .per_dni input').val(per_dni);
            modal.find('.modal-body .idconsulta input').val(idconsulta);

            if (cont_id == 1){

                modal.find('.edit_primero').addClass('active');
                modal.find('.edit_segundo').removeClass('active');
                modal.find('.edit_tercero').removeClass('active');

            } else if (cont_id == 2){

                modal.find('.edit_segundo').addClass('active');
                modal.find('.edit_primero').removeClass('active');
                modal.find('.edit_tercero').removeClass('active');

            } else {

                modal.find('.edit_tercero').addClass('active');
                modal.find('.edit_primero').removeClass('active');
                modal.find('.edit_segundo').removeClass('active');

            }

            modal.find('.edit_primero').css({ 'pointer-events': "none" });
            modal.find('.edit_segundo').css({ 'pointer-events': "none" });
            modal.find('.edit_tercero').css({ 'pointer-events': "none" });


            $("#idconsulta").attr('action', per_id);

        });

        //Finaliza el modal de eliminar

        //Inicia el modal de edit

        $('#modal_consulta_edit').on('show.bs.modal', function (e) {

            var per_id = $(e.relatedTarget).data('per_id');
            var per_apellido = $(e.relatedTarget).data('per_apellido');
            var per_nombre = $(e.relatedTarget).data('per_nombre');
            var per_email = $(e.relatedTarget).data('per_email');
            var per_tel_fijo = $(e.relatedTarget).data('per_tel_fijo');
            var per_tel_cel = $(e.relatedTarget).data('per_tel_cel');
            var per_mensaje = $(e.relatedTarget).data('per_mensaje');
            var per_fecha_carga = $(e.relatedTarget).data('per_fecha_carga');
            var per_hora_carga = $(e.relatedTarget).data('per_hora_carga');
            var per_domicilio = $(e.relatedTarget).data('per_domicilio');
            var per_dni = $(e.relatedTarget).data('per_dni');
            var idconsulta = $(e.relatedTarget).data('idconsulta');
            var cont_id = $(e.relatedTarget).data('cont_id');

            var modal = $(this);
            modal.find('.modal-body .per_id input').val(per_id);
            modal.find('.modal-body .per_apellido input').val(per_apellido);
            modal.find('.modal-body .per_nombre input').val(per_nombre);
            modal.find('.modal-body .per_email input').val(per_email);
            modal.find('.modal-body .per_tel_fijo input').val(per_tel_fijo);
            modal.find('.modal-body .per_tel_cel input').val(per_tel_cel);
            modal.find('.modal-body .per_mensaje textarea').val(per_mensaje);
            modal.find('.modal-body .per_fecha_carga input').val(per_fecha_carga);
            modal.find('.modal-body .per_hora_carga input').val(per_hora_carga);
            modal.find('.modal-body .per_domicilio input').val(per_domicilio);
            modal.find('.modal-body .per_dni input').val(per_dni);
            modal.find('.modal-body .idconsulta input').val(idconsulta);

            if (cont_id == 1){

                modal.find('.edit_primero').addClass('active');
                modal.find('.edit_segundo').removeClass('active');
                modal.find('.edit_tercero').removeClass('active');

            } else if (cont_id == 2){

                modal.find('.edit_segundo').addClass('active');
                modal.find('.edit_primero').removeClass('active');
                modal.find('.edit_tercero').removeClass('active');

            } else {

                modal.find('.edit_tercero').addClass('active');
                modal.find('.edit_primero').removeClass('active');
                modal.find('.edit_segundo').removeClass('active');

            }


            //$("#idconsulta").attr('action', per_id);

        });


        $('#modal_mail').on('show.bs.modal', function (e) {

            $(".modal_mail_form").attr('action', 'consulta');

            var idconsulta = $(e.relatedTarget).data('idconsulta');
            var email = $(e.relatedTarget).data('email');
            var modal = $(this);
            modal.find('.modal-body .id input').val(idconsulta);
            modal.find('.modal-body .email input').val(email);

        });

    </script>

@endsection