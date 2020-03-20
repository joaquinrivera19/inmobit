@extends('layouts.app')

@section('content')

    <!-- Main Content -->
    <section class="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <p>No se pudo crear y/o editar el cliente por que: </p>
                            <br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                @if ($clientes->count() == 0)

                    <!-- Cartel "no hay cliente" -->
                        <div class="no-properties">
                            <h1 class="admin-title-big">Todavía no cargó ningún cliente</h1>

                            <button type="button" class="btn-lg btn btn-blue" data-toggle="modal"
                                    data-target="#modal_cliente_create"><i
                                        class="fa fa-plus-circle"></i>
                                CARGAR NUEVO CLIENTE
                            </button>

                        </div>
                        <!-- fin cartel "no hay cliente" -->

                    @else

                    <!-- Tabla de clientes -->
                        <div class="admin-table">
                            <div class="header-table header-table-propietarios">
                                <div class="row">
                                    <div class="col-xs-12 hidden-sm hidden-md hidden-lg">
                                        <button type="button" class="btn btn-blue tasacion-btn-mobile"
                                                data-toggle="modal"
                                                data-target="#modal_cliente_create">CARGAR NUEVO CLIENTE
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
                                                    <li><a href="#">Exportar en excel</a></li>
                                                    <li><a href="#">Eliminar</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <nav class="hidden-xs">
                                            <ul class="actions-group-buttons">
                                                <li>
                                                    <button type="button" class="btn btn-blue" data-toggle="modal"
                                                            data-target="#modal_cliente_create">CARGAR NUEVO
                                                        CLIENTE
                                                    </button>
                                                </li>
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
												<button class="btn btn-blue btn_buscar" type="button"><i
                                                            class="fa fa-search"></i></button>

											  </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {!! Form::open(array('url' => 'cliente','method' => 'post', 'id' => 'form_superior')) !!}

                            <table class="TableAdmin TablePropietarios table table-hover table-compresed table-striped"
                                   id="items_resultado">

                                <div id="busqueda_vacia" style="display: none">

                                    <p> No hay resultados</p>

                                </div>

                                <div id="busqueda_novacia">

                                    @foreach($clientes as $cliente)
                                        <tr>
                                            <td class="TableCheckbox">
                                                <input name="check[{{ $cliente->comer_id }}]" type="checkbox"
                                                       data-id="{{ $cliente->comer_id }}">
                                            </td>
                                            <td class="TableInfo">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <h6><b>Apellido y Nombre</b><i>:</i></h6>
                                                        <p>
                                                            <b>{{ $cliente->apellido }}</b> {{ $cliente->nombre }}
                                                        </p>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <h6>Teléfono <i>:</i></h6>
                                                        <p>
                                                            <b>{{ $cliente->tel_fijo }}</b></br>{{ $cliente->tel_cel}}
                                                        </p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <h6>Email<i>:</i></h6>
                                                        <p>{{ $cliente->email }}</p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <h6>Domicilio<i>:</i></h6>
                                                        <p><b>{{ $cliente->domicilio }}</b><br>Localidad</p>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <h6>ID<i>:</i></h6>
                                                        @if ($cliente->comer_id == null)
                                                            <p>0</p>
                                                        @else
                                                            <p>{{ $cliente->comer_id }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="TableActions">
                                                <div class="hidden-sm hidden-xs">
                                                    <div class="btn-group" role="group">

                                                        <button type="button"
                                                                data-per_apellido="{!! $cliente->apellido !!}"
                                                                data-per_nombre="{!! $cliente->nombre !!}"
                                                                data-per_dni="{!! $cliente->dni !!}"
                                                                data-per_email="{!! $cliente->email !!}"
                                                                data-per_tel_fijo="{!! $cliente->tel_fijo !!}"
                                                                data-per_tel_cel="{!! $cliente->tel_cel !!}"
                                                                data-per_domicilio="{!! $cliente->domicilio !!}"
                                                                data-per_id="{!! $cliente->id !!}"
                                                                class="btn btn-white" data-toggle="modal"
                                                                data-target="#modal_cliente_edit">Editar
                                                        </button>

                                                    {{-- <button type="button"
                                                                data-idpropietario="{!! $cliente->propcomer_id !!}"
                                                                data-email="{!! $cliente->email !!}"
                                                                class="btn btn-white" data-toggle="modal"
                                                                data-target="#modal_mail">Cta Cte
                                                        </button>--}}

                                                        <a href="{{ url('/mi_cuenta/'.$cliente->comer_id) }}"
                                                           type="button" class="btn btn-white"
                                                           style="line-height: 30px;">Cta Cte
                                                        </a>

                                                        <button type="button"
                                                                data-per_apellido="{!! $cliente->apellido !!}"
                                                                data-per_nombre="{!! $cliente->nombre !!}"
                                                                data-per_dni="{!! $cliente->dni !!}"
                                                                data-per_email="{!! $cliente->email !!}"
                                                                data-per_tel_fijo="{!! $cliente->tel_fijo !!}"
                                                                data-per_tel_cel="{!! $cliente->tel_cel !!}"
                                                                data-per_domicilio="{!! $cliente->domicilio !!}"
                                                                data-per_id="{!! $cliente->id !!}"
                                                                data-comer_id="{!! $cliente->comer_id !!}"
                                                                class="btn btn-white" data-toggle="modal"
                                                                data-target="#modal_cliente_eliminar">Eliminar
                                                        </button>

                                                    </div>
                                                    <div class="btn-group btn-group-large" role="group">

                                                        <a href="{{ url('/propiedades/'.$cliente->comer_id.'/cliente') }}"
                                                           type="button" class="btn btn-white"
                                                           style="line-height: 30px;">Ver Propiedades
                                                        </a>

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


    @include('cliente.modal_create')

    @if ($clientes->count() != 0)

        @include('cliente.modal_eliminar')
        @include('cliente.modal_edit')
        @include('modal_mail')

        @include('cliente.modal_eliminar_muchos')
        @include('cliente.modal_exportar_muchos')

    @endif


@endsection

@section('scripts')

    <script type="text/javascript" src="{{ asset('js/validate_cliente.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function () {

            $('.btn_buscar').click(function () {
                buscar_datos();
            });

            $('.buscador').keyup(function () {
                buscar_datos();
            });

            function buscar_datos() {

                var buscador = $('.buscador').val();

                if (!buscador) {
                    buscador = 0
                }

                var html = "";

                $.ajax({
                    url: '{{ URL::to("/filtrocliente/") }}/' + buscador,
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

                            $url_propiedades = '{{ URL::to("/propiedades/") }}/' + data.data[i].propcomer_id + '/cliente';
                            $url_mi_cuenta = '{{ URL::to("/mi_cuenta/") }}/' + data.data[i].comer_id;

                            html += "<tr>";
                            html += "<td class='TableCheckbox'>";
                            html += "<input name='check[" + data.data[i].propcomer_id + "]' type='checkbox' data-id='" + data.data[i].propcomer_id + "'>";
                            html += "</td>";
                            html += "<td class='TableInfo'>";
                            html += "<div class='row'>";
                            html += "<div class='col-md-3'>";
                            html += "<h6><b>Apellido y Nombre</b><i>:</i></h6>";
                            html += "<p><b>" + data.data[i].apellido + "</b> " + data.data[i].nombre + "</p>";
                            html += "</div>";
                            html += "<div class='col-md-2'><h6>Teléfono <i>:</i></h6><p><b>" + data.data[i].tel_fijo + "</b></br>" + data.data[i].tel_cel + "</p>";
                            html += "</div>";
                            html += "<div class='col-md-3'><h6>Email<i>:</i></h6><p>" + data.data[i].email + "</p>";
                            html += "</div>";
                            html += "<div class='col-md-3'><h6>Domicilio<i>:</i></h6><p><b>" + data.data[i].domicilio + "</b><br>Localidad</p>";
                            html += "</div>";
                            html += "<div class='col-md-1'><h6>ID<i>:</i></h6>";
                            html += "<p>" + data.data[i].comer_id + "</p>";

                            html += "</div>";
                            html += "</div>";
                            html += "</td>";
                            html += "<td class='TableActions'>";
                            html += "<div class='hidden-sm hidden-xs'>";
                            html += "<div class='btn-group' role='group'>";

                            html += "<button type='button' " +
                                " data-per_apellido=" + data.data[i].apellido + "" +
                                " data-per_nombre=" + data.data[i].nombre + " " +
                                " data-per_dni=" + data.data[i].dni + " " +
                                " data-per_email=" + data.data[i].email + " " +
                                " data-per_tel_fijo=" + data.data[i].tel_fijo + " " +
                                " data-per_tel_cel=" + data.data[i].tel_cel + " " +
                                " data-per_domicilio=" + data.data[i].domicilio + " " +
                                " data-per_id=" + data.data[i].id + " " +
                                " class='btn btn-white' data-toggle='modal' data-target='#modal_cliente_edit'>Editar</button>";

                            /*html += "<button type='button' data-idpropietario=" + data.data[i].propcomer_id + " " +
                                " data-email=" + data.data[i].email + " class='btn btn-white' " +
                                " data-toggle='modal' data-target='#modal_mail'>Enviar mail </button>";*/

                            html += "<a href='" + $url_mi_cuenta + "' type='button' class='btn btn-white' style='line-height: 30px;'>Cta Cte</a>";

                            html += "<button type='button' " +
                                " data-per_apellido=" + data.data[i].apellido + "" +
                                " data-per_nombre=" + data.data[i].nombre + " " +
                                " data-per_dni=" + data.data[i].dni + " " +
                                " data-per_email=" + data.data[i].email + " " +
                                " data-per_tel_fijo=" + data.data[i].tel_fijo + " " +
                                " data-per_tel_cel=" + data.data[i].tel_cel + " " +
                                " data-per_domicilio=" + data.data[i].domicilio + " " +
                                " data-per_id=" + data.data[i].id + " " +
                                " data-comer_id=" + data.data[i].comer_id + " " +
                                " class='btn btn-white' data-toggle='modal' data-target='#modal_cliente_eliminar'>Eliminar";
                            html += "</button>";

                            html += "</div>";
                            html += "<div class='btn-group btn-group-large' role='group'>";
                            html += "<a href='" + $url_propiedades + "' type='button' class='btn btn-white'";
                            html += "style='line-height: 30px;'>Ver Propiedades</a>";
                            html += "</div>";
                            html += "</div>";
                            html += "</td>";
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

        $('#modal_cliente_eliminar').on('show.bs.modal', function (e) {

            var per_id = $(e.relatedTarget).data('per_id');
            var per_apellido = $(e.relatedTarget).data('per_apellido');
            var per_nombre = $(e.relatedTarget).data('per_nombre');
            var per_email = $(e.relatedTarget).data('per_email');
            var per_tel_fijo = $(e.relatedTarget).data('per_tel_fijo');
            var per_tel_cel = $(e.relatedTarget).data('per_tel_cel');
            var per_domicilio = $(e.relatedTarget).data('per_domicilio');
            var comer_id = $(e.relatedTarget).data('comer_id');
            var per_dni = $(e.relatedTarget).data('per_dni');


            var modal = $(this);
            modal.find('.modal-body .per_id input').val(per_id);
            modal.find('.modal-body .per_apellido input').val(per_apellido);
            modal.find('.modal-body .per_nombre input').val(per_nombre);
            modal.find('.modal-body .per_email input').val(per_email);
            modal.find('.modal-body .per_tel_fijo input').val(per_tel_fijo);
            modal.find('.modal-body .per_tel_cel input').val(per_tel_cel);
            modal.find('.modal-body .per_domicilio input').val(per_domicilio);
            modal.find('.modal-body .per_dni input').val(per_dni);
            modal.find('.modal-body .comer_id input').val(comer_id);

            $("#idpropiestario").attr('action', per_id);

        });

        //Finaliza el modal de eliminar

        //Inicia el modal de edit

        $('#modal_cliente_edit').on('show.bs.modal', function (e) {

            var per_id = $(e.relatedTarget).data('per_id');
            var per_apellido = $(e.relatedTarget).data('per_apellido');
            var per_nombre = $(e.relatedTarget).data('per_nombre');
            var per_email = $(e.relatedTarget).data('per_email');
            var per_tel_fijo = $(e.relatedTarget).data('per_tel_fijo');
            var per_tel_cel = $(e.relatedTarget).data('per_tel_cel');
            var per_domicilio = $(e.relatedTarget).data('per_domicilio');
            var per_dni = $(e.relatedTarget).data('per_dni');


            var modal = $(this);
            modal.find('.modal-body .per_id input').val(per_id);
            modal.find('.modal-body .per_apellido input').val(per_apellido);
            modal.find('.modal-body .per_nombre input').val(per_nombre);
            modal.find('.modal-body .per_email input').val(per_email);
            modal.find('.modal-body .per_tel_fijo input').val(per_tel_fijo);
            modal.find('.modal-body .per_tel_cel input').val(per_tel_cel);
            modal.find('.modal-body .per_domicilio input').val(per_domicilio);
            modal.find('.modal-body .per_dni input').val(per_dni);

            //$("#idpropiestario").attr('action', per_id);

        });

        //Finaliza el modal de edit

        $('#modal_mail').on('show.bs.modal', function (e) {

            $(".modal_mail_form").attr('action', 'propietario');

            var idpropietario = $(e.relatedTarget).data('idpropietario');
            var email = $(e.relatedTarget).data('email');
            var modal = $(this);
            modal.find('.modal-body .id input').val(idpropietario);
            modal.find('.modal-body .email input').val(email);

        });

    </script>

@endsection