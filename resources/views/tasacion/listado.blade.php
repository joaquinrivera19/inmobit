@extends('layouts.app')

@section('content')

    <!-- Main Content -->
    <section class="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">

                @if ($tasaciones->count() == 0)

                    <!-- Cartel "no hay propiedades" -->
                        <div class="no-properties">
                            <h1 class="admin-title-big">Todavía no cargó ninguna Tasación</h1>
                            <p><button type="button" class="btn-lg btn btn-blue" data-toggle="modal"
                                  data-target="#modal_tasacion_create"><i
                                            class="fa fa-plus-circle"></i>
                                    CARGAR TASACIÓN</button></p>
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
                                                data-target="#modal_tasacion_create">NUEVA TASACION
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
                                                            data-target="#modal_tasacion_create">NUEVA TASACION
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

                            {!! Form::open(array('url' => 'tasacion','method' => 'post', 'id' => 'form_superior')) !!}

                            <table class="TableAdmin TablePropietarios table table-hover table-compresed table-striped"
                                   id="items_resultado">

                                <div id="busqueda_vacia" style="display: none">

                                    <p> No hay resultados</p>

                                </div>

                                <div id="busqueda_novacia">

                                    @foreach($tasaciones as $tasacion)
                                        <tr>
                                            <td class="TableCheckbox">
                                                <input name="check[{{ $tasacion->tas_id }}]" type="checkbox" data-id="{{ $tasacion->tas_id }}">
                                            </td>
                                            <td class="TableInfo">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                                        <h6><b>Fecha</b><i>:</i></h6>
                                                        <p><b>{{ $tasacion->fecha }}</b></br>{{ $tasacion->hora }} hs.
                                                        </p>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-3">
                                                        <h6>Propietario <i>:</i></h6>
                                                        <p>
                                                            <b>{{ $tasacion->apellido }} {{ $tasacion->nombre }}</b></br>{{ $tasacion->tel_cel }}</br>{{ $tasacion->email }}
                                                        </p>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                                        <h6>Ubicación de la propiedad<i>:</i></h6>
                                                        <p>{{ $tasacion->direccion_propiedad }}</p>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
                                                        <h6>Operación<i>:</i></h6>
                                                        <p>
                                                            <b>{{ $tasacion->tipoinmu }}</b><br>{{ $tasacion->tipo_operacion }}
                                                        </p>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                                        <h6>Valor tasación<i>:</i></h6>
                                                        <p>$ {{ $tasacion->valor_tasacion }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="TableActions">
                                                <div class="hidden-sm hidden-xs">
                                                    <div class="btn-group" role="group">

                                                        <button type="button" data-idtasacion="{!! $tasacion->tas_id !!}"
                                                                data-email="{!! $tasacion->email !!}"
                                                                class="btn btn-white" data-toggle="modal"
                                                                data-target="#modal_mail">Enviar mail
                                                        </button>

                                                        <button type="button"
                                                                data-per_id="{!! $tasacion->idpersona !!}"
                                                                data-per_apellido="{!! $tasacion->apellido !!}"
                                                                data-per_nombre="{!! $tasacion->nombre !!}"
                                                                data-per_dni="{!! $tasacion->dni !!}"
                                                                data-per_email="{!! $tasacion->email !!}"
                                                                data-per_tel_fijo="{!! $tasacion->tel_fijo !!}"
                                                                data-per_tel_cel="{!! $tasacion->tel_cel !!}"
                                                                data-per_domicilio="{!! $tasacion->per_domicilio !!}"
                                                                data-direccion_propiedad="{!! $tasacion->direccion_propiedad !!}"
                                                                data-tipoinmu_id="{!! $tasacion->tipoinmu_id !!}"
                                                                data-tipo_operacion="{!! $tasacion->tipo_operacion !!}"
                                                                data-valor_tasacion="{!! $tasacion->valor_tasacion !!}"
                                                                data-tas_descripcion="{!! $tasacion->tas_descripcion !!}"
                                                                data-tas_valor_venta="{!! $tasacion->tas_valor_venta !!}"
                                                                data-tas_valor_alq="{!! $tasacion->tas_valor_alq !!}"
                                                                data-tas_valor_alq_temp="{!! $tasacion->tas_valor_alq_temp !!}"
                                                                data-hab_id="{!! $tasacion->hab_id !!}"
                                                                data-numamb_id="{!! $tasacion->numamb_id !!}"
                                                                data-ban_id="{!! $tasacion->ban_id !!}"
                                                                data-mon_id="{!! $tasacion->mon_id !!}"
                                                                data-tas_id="{!! $tasacion->tas_id !!}"
                                                                data-prop_dim_total="{!! $tasacion->prop_dim_total !!}"
                                                                data-prop_dim_construido="{!! $tasacion->prop_dim_construido !!}"
                                                                data-tas_exp="{!! $tasacion->tas_exp !!}"
                                                                data-propietario_id="{!! $tasacion->propietario_id !!}"
                                                                data-prop_id="{!! $tasacion->prop_id !!}"
                                                                class="btn btn-white" data-toggle="modal"
                                                                data-target="#modal-tasacion-eliminar">Eliminar
                                                        </button>

                                                    </div>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ url('getexportaciontasacionid_pdf/'.$tasacion->tas_id) }}"
                                                           type="button" class="btn btn-white" style="padding-top: 12px" target="_blank">Exporta PDF
                                                        </a>

                                                        <button type="button"
                                                                data-per_id="{!! $tasacion->idpersona !!}"
                                                                data-per_apellido="{!! $tasacion->apellido !!}"
                                                                data-per_nombre="{!! $tasacion->nombre !!}"
                                                                data-per_dni="{!! $tasacion->dni !!}"
                                                                data-per_email="{!! $tasacion->email !!}"
                                                                data-per_tel_fijo="{!! $tasacion->tel_fijo !!}"
                                                                data-per_tel_cel="{!! $tasacion->tel_cel !!}"
                                                                data-per_domicilio="{!! $tasacion->per_domicilio !!}"
                                                                data-direccion_propiedad="{!! $tasacion->direccion_propiedad !!}"
                                                                data-tipoinmu_id="{!! $tasacion->tipoinmu_id !!}"
                                                                data-tipo_operacion="{!! $tasacion->tipo_operacion !!}"
                                                                data-valor_tasacion="{!! $tasacion->valor_tasacion !!}"
                                                                data-tas_descripcion="{!! $tasacion->tas_descripcion !!}"
                                                                data-tas_valor_venta="{!! $tasacion->tas_valor_venta !!}"
                                                                data-tas_valor_alq="{!! $tasacion->tas_valor_alq !!}"
                                                                data-tas_valor_alq_temp="{!! $tasacion->tas_valor_alq_temp !!}"
                                                                data-hab_id="{!! $tasacion->hab_id !!}"
                                                                data-numamb_id="{!! $tasacion->numamb_id !!}"
                                                                data-ban_id="{!! $tasacion->ban_id !!}"
                                                                data-mon_id="{!! $tasacion->mon_id !!}"
                                                                data-tas_id="{!! $tasacion->tas_id !!}"
                                                                data-prop_dim_total="{!! $tasacion->prop_dim_total !!}"
                                                                data-prop_dim_construido="{!! $tasacion->prop_dim_construido !!}"
                                                                data-tas_exp="{!! $tasacion->tas_exp !!}"
                                                                data-propietario_id="{!! $tasacion->propietario_id !!}"
                                                                data-prop_id="{!! $tasacion->prop_id !!}"
                                                                class="btn btn-white" data-toggle="modal"
                                                                data-target="#modal_tasacion_edit">Editar
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

        @include('tasacion.modal_create')

    @if ($tasaciones->count() != 0)

        @include('tasacion.modal_eliminar')
        @include('tasacion.modal_edit')
        @include('modal_mail')

        @include('tasacion.modal_eliminar_muchos')

    @endif


@endsection

@section('scripts')

    <script type="text/javascript" src="{{ asset('js/validate_tasacion.js') }}"></script>

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
                    url: '{{ URL::to("/filtrotasacion/") }}/' + fecha_desde + '/' + fecha_hasta + '/' + buscador + '/' + select_ordenar,
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

                            //console.log(data.data[i].fecha + data.data[i].hora);

                            $url = '{{ URL::to("/getexportaciontasacionid_pdf/") }}/' + data.data[i].tas_id;

                            html += "<tr>";
                            html += "<td class='TableCheckbox'><input name='check[" + data.data[i].tas_id + "]' type='checkbox' data-id=" + data.data[i].tas_id + "></td>";
                            html += "<td class='TableInfo'>" +
                                "<div class='row'>" +
                                "<div class='col-xs-12 col-sm-2 col-md-2 col-lg-2'>" +
                                "<h6><b>Fecha</b><i>:</i></h6>" +
                                "<p><b>" + data.data[i].fecha + "</b><br>" + data.data[i].hora + " hs</p>" +
                                "</div>" +
                                "<div class='col-xs-12 col-sm-2 col-md-2 col-lg-3'>" +
                                "<h6>Propietario <i>:</i></h6>" +
                                "<p><b>" + data.data[i].apellido + " - " + data.data[i].nombre + "</b><br>" + data.data[i].tel_fijo + " / " + data.data[i].tel_cel + "<br>" + data.data[i].email + "</p>" +
                                "</div>" +
                                "<div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>" +
                                "<h6>Ubicación de la propiedad<i>:</i></h6>" +
                                "<p>" + data.data[i].direccion_propiedad + "</p>" +
                                "</div>" +
                                "<div class='col-xs-12 col-sm-3 col-md-3 col-lg-2'>" +
                                "<h6>Operación<i>:</i></h6><p><b>" + data.data[i].tipoinmu + "</b><br>" + data.data[i].tipo_operacion + "</p>" +
                                "</div>" +
                                "<div class='col-xs-12 col-sm-2 col-md-2 col-lg-2'>" +
                                "<h6>Valor tasación<i>:</i></h6><p>$ " + data.data[i].valor_tasacion + "</p>" +
                                "</div>" +
                                "</div>" +
                                "</td>";
                            html += "<td class='TableActions'>" +
                                "<div class='hidden-sm hidden-xs'>" +
                                "<div class='btn-group' role='group'>" +
                                "<button type='button' data-idtasacion='" + data.data[i].tas_id + "' data-email='" + data.data[i].email + "' class='btn btn-white' data-toggle='modal' data-target='#modal_mail'>Enviar mail </button>" +
                                "<button type='button' " +
                                " data-per_id=" + data.data[i].idpersona + " " +
                                " data-per_apellido=" + data.data[i].apellido + " " +
                                " data-per_nombre=" + data.data[i].nombre + " " +
                                " data-per_dni=" + data.data[i].dni + " " +
                                " data-per_email=" + data.data[i].email + " " +
                                " data-per_tel_fijo=" + data.data[i].tel_fijo + " " +
                                " data-per_tel_cel=" + data.data[i].tel_cel + " " +
                                " data-direccion_propiedad=" + data.data[i].direccion_propiedad + " " +
                                " data-tipoinmu_id=" + data.data[i].tipoinmu_id + " " +
                                " data-tipo_operacion=" + data.data[i].tipo_operacion + " " +
                                " data-valor_tasacion=" + data.data[i].valor_tasacion + " " +
                                " data-tas_descripcion=" + data.data[i].tas_descripcion + " " +
                                " data-tas_valor_venta=" + data.data[i].tas_valor_venta + " " +
                                " data-tas_valor_alq=" + data.data[i].tas_valor_alq + " " +
                                " data-tas_valor_alq_temp=" + data.data[i].tas_valor_alq_temp + " " +
                                " data-hab_id=" + data.data[i].hab_id + " " +
                                " data-numamb_id=" + data.data[i].numamb_id + " " +
                                " data-ban_id=" + data.data[i].ban_id + " " +
                                " data-mon_id=" + data.data[i].mon_id + " " +
                                " data-tas_id=" + data.data[i].tas_id + " " +
                                " data-prop_dim_total=" + data.data[i].prop_dim_total + " " +
                                " data-prop_dim_construido=" + data.data[i].prop_dim_construido + " " +
                                " data-tas_exp=" + data.data[i].tas_exp + " " +
                                " data-propietario_id=" + data.data[i].propietario_id + " " +
                                " data-prop_id=" + data.data[i].prop_id + " " +
                                " class='btn btn-white' data-toggle='modal' " +
                                " data-target='#modal-tasacion-eliminar'>Eliminar</button> " +
                                "</div> ";

                            html += "<div class='btn-group' role='group'> " +
                                "<a href='" + $url + "' type='button' class='btn btn-white' style='padding-top: 12px;' target='_blank'>Exporta PDF</a>" +
                                "<button type='button' " +
                                " data-per_id=" + data.data[i].idpersona + " " +
                                " data-per_apellido=" + data.data[i].apellido + " " +
                                " data-per_nombre=" + data.data[i].nombre + " " +
                                " data-per_dni=" + data.data[i].dni + " " +
                                " data-per_email=" + data.data[i].email + " " +
                                " data-per_tel_fijo=" + data.data[i].tel_fijo + " " +
                                " data-per_tel_cel=" + data.data[i].tel_cel + " " +
                                " data-direccion_propiedad=" + data.data[i].direccion_propiedad + " " +
                                " data-tipoinmu_id=" + data.data[i].tipoinmu_id + " " +
                                " data-tipo_operacion=" + data.data[i].tipo_operacion + " " +
                                " data-valor_tasacion=" + data.data[i].valor_tasacion + " " +
                                " data-tas_descripcion=" + data.data[i].tas_descripcion + " " +
                                " data-tas_valor_venta=" + data.data[i].tas_valor_venta + " " +
                                " data-tas_valor_alq=" + data.data[i].tas_valor_alq + " " +
                                " data-tas_valor_alq_temp=" + data.data[i].tas_valor_alq_temp + " " +
                                " data-hab_id=" + data.data[i].hab_id + " " +
                                " data-numamb_id=" + data.data[i].numamb_id + " " +
                                " data-ban_id=" + data.data[i].ban_id + " " +
                                " data-mon_id=" + data.data[i].mon_id + " " +
                                " data-tas_id=" + data.data[i].tas_id + " " +
                                " data-prop_dim_total=" + data.data[i].prop_dim_total + " " +
                                " data-prop_dim_construido=" + data.data[i].prop_dim_construido + " " +
                                " data-tas_exp=" + data.data[i].tas_exp + " " +
                                " data-propietario_id=" + data.data[i].propietario_id + " " +
                                " data-prop_id=" + data.data[i].prop_id + " " +
                                " class='btn btn-white' data-toggle='modal' " +
                                " data-target='#modal_tasacion_edit'>Editar </button> " +
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

        $('#modal-tasacion-eliminar').on('show.bs.modal', function (e) {

            var per_id = $(e.relatedTarget).data('per_id');
            var per_apellido = $(e.relatedTarget).data('per_apellido');
            var per_nombre = $(e.relatedTarget).data('per_nombre');
            var per_email = $(e.relatedTarget).data('per_email');
            var per_dni = $(e.relatedTarget).data('per_dni');
            var per_tel_fijo = $(e.relatedTarget).data('per_tel_fijo');
            var per_tel_cel = $(e.relatedTarget).data('per_tel_cel');
            var per_domicilio = $(e.relatedTarget).data('per_domicilio');
            var direccion_propiedad = $(e.relatedTarget).data('direccion_propiedad');
            var tipoinmu_id = $(e.relatedTarget).data('tipoinmu_id');
            var tipo_operacion = $(e.relatedTarget).data('tipo_operacion');
            var valor_tasacion = $(e.relatedTarget).data('valor_tasacion');
            var tas_descripcion = $(e.relatedTarget).data('tas_descripcion');
            var tas_valor_venta = $(e.relatedTarget).data('tas_valor_venta');
            var tas_valor_alq = $(e.relatedTarget).data('tas_valor_alq');
            var tas_valor_alq_temp = $(e.relatedTarget).data('tas_valor_alq_temp');
            var hab_id = $(e.relatedTarget).data('hab_id');
            var numamb_id = $(e.relatedTarget).data('numamb_id');
            var ban_id = $(e.relatedTarget).data('ban_id');
            var mon_id = $(e.relatedTarget).data('mon_id');
            var prop_dim_construido = $(e.relatedTarget).data('prop_dim_construido');
            var tas_exp = $(e.relatedTarget).data('tas_exp');
            var prop_dim_total = $(e.relatedTarget).data('prop_dim_total');
            var propietario_id = $(e.relatedTarget).data('propietario_id');
            var prop_id = $(e.relatedTarget).data('prop_id');
            var tas_id = $(e.relatedTarget).data('tas_id');

            var modal = $(this);
            modal.find('.modal-body .per_id input').val(per_id);
            modal.find('.modal-body .per_apellido input').val(per_apellido);
            modal.find('.modal-body .per_nombre input').val(per_nombre);
            modal.find('.modal-body .per_email input').val(per_email);
            modal.find('.modal-body .per_dni input').val(per_dni);
            modal.find('.modal-body .per_tel_fijo input').val(per_tel_fijo);
            modal.find('.modal-body .per_tel_cel input').val(per_tel_cel);
            modal.find('.modal-body .per_domicilio input').val(per_domicilio);
            modal.find('.modal-body .direccion_propiedad input').val(direccion_propiedad);
            modal.find('.modal-body #tipoinmu_id').val(tipoinmu_id);
            modal.find('.modal-body .tipo_operacion input').val(tipo_operacion);
            modal.find('.modal-body .valor_tasacion input').val(valor_tasacion);
            modal.find('.modal-body .tas_descripcion textarea').val(tas_descripcion);
            modal.find('.modal-body .tas_valor_venta input').val(tas_valor_venta);
            modal.find('.modal-body .tas_valor_alq input').val(tas_valor_alq);
            modal.find('.modal-body .tas_valor_alq_temp input').val(tas_valor_alq_temp);
            modal.find('.modal-body .prop_dim_construido input').val(prop_dim_construido);
            modal.find('.modal-body .prop_dim_total input').val(prop_dim_total);
            modal.find('.modal-body .propietario_id input').val(propietario_id);
            modal.find('.modal-body .prop_id input').val(prop_id);
            modal.find('.modal-body #hab_id').val(hab_id);
            modal.find('.modal-body #numamb_id').val(numamb_id);
            modal.find('.modal-body #ban_id').val(ban_id);
            modal.find('.modal-body .mon_id').val(mon_id);
            modal.find('.modal-body .tas_id input').val(tas_id);
            modal.find('.modal-body .tas_exp input').val(tas_exp);

            $("#idtasacion").attr('action', per_id);

        });

        //Finaliza el modal de eliminar

        //Inicia el modal de edit

        $('#modal_tasacion_edit').on('show.bs.modal', function (e) {

            var per_id = $(e.relatedTarget).data('per_id');
            var per_apellido = $(e.relatedTarget).data('per_apellido');
            var per_nombre = $(e.relatedTarget).data('per_nombre');
            var per_email = $(e.relatedTarget).data('per_email');
            var per_dni = $(e.relatedTarget).data('per_dni');
            var per_tel_fijo = $(e.relatedTarget).data('per_tel_fijo');
            var per_tel_cel = $(e.relatedTarget).data('per_tel_cel');
            var per_domicilio = $(e.relatedTarget).data('per_domicilio');
            var direccion_propiedad = $(e.relatedTarget).data('direccion_propiedad');
            var tipoinmu_id = $(e.relatedTarget).data('tipoinmu_id');
            var tipo_operacion = $(e.relatedTarget).data('tipo_operacion');
            var valor_tasacion = $(e.relatedTarget).data('valor_tasacion');
            var tas_descripcion = $(e.relatedTarget).data('tas_descripcion');
            var tas_valor_venta = $(e.relatedTarget).data('tas_valor_venta');
            var tas_valor_alq = $(e.relatedTarget).data('tas_valor_alq');
            var tas_valor_alq_temp = $(e.relatedTarget).data('tas_valor_alq_temp');
            var hab_id = $(e.relatedTarget).data('hab_id');
            var numamb_id = $(e.relatedTarget).data('numamb_id');
            var ban_id = $(e.relatedTarget).data('ban_id');
            var mon_id = $(e.relatedTarget).data('mon_id');
            var prop_dim_construido = $(e.relatedTarget).data('prop_dim_construido');
            var tas_exp = $(e.relatedTarget).data('tas_exp');
            var prop_dim_total = $(e.relatedTarget).data('prop_dim_total');
            var propietario_id = $(e.relatedTarget).data('propietario_id');
            var prop_id = $(e.relatedTarget).data('prop_id');
            var tas_id = $(e.relatedTarget).data('tas_id');

            var modal = $(this);
            modal.find('.modal-body .per_id input').val(per_id);
            modal.find('.modal-body .per_apellido input').val(per_apellido);
            modal.find('.modal-body .per_nombre input').val(per_nombre);
            modal.find('.modal-body .per_email input').val(per_email);
            modal.find('.modal-body .per_dni input').val(per_dni);
            modal.find('.modal-body .per_tel_fijo input').val(per_tel_fijo);
            modal.find('.modal-body .per_tel_cel input').val(per_tel_cel);
            modal.find('.modal-body .per_domicilio input').val(per_domicilio);
            modal.find('.modal-body .direccion_propiedad input').val(direccion_propiedad);
            modal.find('.modal-body #tipoinmu_id').val(tipoinmu_id);
            modal.find('.modal-body .tipo_operacion input').val(tipo_operacion);
            modal.find('.modal-body .valor_tasacion input').val(valor_tasacion);
            modal.find('.modal-body .tas_descripcion textarea').val(tas_descripcion);
            modal.find('.modal-body .tas_valor_venta input').val(tas_valor_venta);
            modal.find('.modal-body .tas_valor_alq input').val(tas_valor_alq);
            modal.find('.modal-body .tas_valor_alq_temp input').val(tas_valor_alq_temp);
            modal.find('.modal-body .prop_dim_construido input').val(prop_dim_construido);
            modal.find('.modal-body .prop_dim_total input').val(prop_dim_total);
            modal.find('.modal-body .propietario_id input').val(propietario_id);
            modal.find('.modal-body .prop_id input').val(prop_id);
            modal.find('.modal-body #hab_id').val(hab_id);
            modal.find('.modal-body #numamb_id').val(numamb_id);
            modal.find('.modal-body #ban_id').val(ban_id);
            modal.find('.modal-body .mon_id').val(mon_id);
            modal.find('.modal-body .tas_id input').val(tas_id);
            modal.find('.modal-body .tas_exp input').val(tas_exp);

            //$("#idtasacion").attr('action', per_id);

        });

        //Finaliza el modal de edit


        $('#modal_mail').on('show.bs.modal', function (e) {

            $(".modal_mail_form").attr('action', 'tasacion');

            var idtasacion = $(e.relatedTarget).data('idtasacion');
            var email = $(e.relatedTarget).data('email');
            var modal = $(this);
            modal.find('.modal-body .id input').val(idtasacion);
            modal.find('.modal-body .email input').val(email);

        });

    </script>

@endsection