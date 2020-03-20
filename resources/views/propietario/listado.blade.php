@extends('layouts.app')

@section('content')

    <!-- Main Content -->
    <section class="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">

                @if ($propietarios->count() == 0)

                    <!-- Cartel "no hay propiedades" -->
                        <div class="no-properties">
                            <h1 class="admin-title-big">Todavía no cargó ningún propietario</h1>

                            <button type="button" class="btn-lg btn btn-blue" data-toggle="modal"
                                    data-target="#modal_propietario_create"><i
                                        class="fa fa-plus-circle"></i>
                                CARGAR NUEVO PROPIETARIO
                            </button>
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
                                                data-target="#modal_propietario_create">CARGAR NUEVO PROPIETARIO
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
                                                            data-target="#modal_propietario_create">CARGAR NUEVO
                                                        PROPIETARIO
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

                            {!! Form::open(array('url' => 'propietario','method' => 'post', 'id' => 'form_superior')) !!}

                            <table class="TableAdmin TablePropietarios table table-hover table-compresed table-striped"
                                   id="items_resultado">

                                <div id="busqueda_vacia" style="display: none">

                                    <p> No hay resultados</p>

                                </div>

                                <div id="busqueda_novacia">

                                    @foreach($propietarios as $propietario)
                                        <tr>
                                            <td class="TableCheckbox">
                                                <input name="check[{{ $propietario->id }}]" type="checkbox"
                                                       data-id="{{ $propietario->id }}">
                                            </td>
                                            <td class="TableInfo">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <h6><b>Apellido y Nombre</b><i>:</i></h6>
                                                        <p>
                                                            <b>{{ $propietario->apellido }}</b> {{ $propietario->nombre }}
                                                        </p>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <h6>Teléfono <i>:</i></h6>
                                                        <p>
                                                            <b>{{ $propietario->tel_fijo }}</b></br>{{ $propietario->tel_cel}}
                                                        </p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <h6>Email<i>:</i></h6>
                                                        <p>{{ $propietario->email }}</p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <h6>Domicilio<i>:</i></h6>
                                                        <p><b>{{ $propietario->domicilio }}</b><br>Localidad</p>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <h6>Propiedad<i>:</i></h6>
                                                        @if ($propietario->num_propiedades == null)
                                                            <p>0</p>
                                                        @else
                                                            <p>{{ $propietario->num_propiedades }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="TableActions">
                                                <div class="hidden-sm hidden-xs">
                                                    <div class="btn-group" role="group">

                                                        <button type="button"
                                                                data-per_apellido="{!! $propietario->apellido !!}"
                                                                data-per_nombre="{!! $propietario->nombre !!}"
                                                                data-per_dni="{!! $propietario->dni !!}"
                                                                data-per_email="{!! $propietario->email !!}"
                                                                data-per_tel_fijo="{!! $propietario->tel_fijo !!}"
                                                                data-per_tel_cel="{!! $propietario->tel_cel !!}"
                                                                data-per_domicilio="{!! $propietario->domicilio !!}"
                                                                data-per_id="{!! $propietario->id !!}"
                                                                class="btn btn-white" data-toggle="modal"
                                                                data-target="#modal_propietario_edit">Editar
                                                        </button>

                                                        <button type="button"
                                                                data-idpropietario="{!! $propietario->id !!}"
                                                                data-email="{!! $propietario->email !!}"
                                                                class="btn btn-white" data-toggle="modal"
                                                                data-target="#modal_mail">Enviar mail
                                                        </button>

                                                        <button type="button"
                                                                data-per_apellido="{!! $propietario->apellido !!}"
                                                                data-per_nombre="{!! $propietario->nombre !!}"
                                                                data-per_dni="{!! $propietario->dni !!}"
                                                                data-per_email="{!! $propietario->email !!}"
                                                                data-per_tel_fijo="{!! $propietario->tel_fijo !!}"
                                                                data-per_tel_cel="{!! $propietario->tel_cel !!}"
                                                                data-per_domicilio="{!! $propietario->domicilio !!}"
                                                                data-per_id="{!! $propietario->id !!}"
                                                                class="btn btn-white" data-toggle="modal"
                                                                data-target="#modal_propietario_eliminar">Eliminar
                                                        </button>

                                                    </div>
                                                    <div class="btn-group btn-group-large" role="group">

                                                        <a href="{{ url('/propiedades/'.$propietario->propietario_id.'/propietario') }}"
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

                            {{ $propietarios->links() }}

                        </div>

                    @endif

                </div>
            </div>
        </div>
    </section>


    @include('propietario.modal_create')

    @if ($propietarios->count() != 0)

        @include('propietario.modal_eliminar')
        @include('propietario.modal_edit')
        @include('modal_mail')

        @include('propietario.modal_eliminar_muchos')
        @include('propietario.modal_exportar_muchos')

    @endif


@endsection

@section('scripts')

    <script type="text/javascript" src="{{ asset('js/validate_propietario.js') }}"></script>

    <script type="text/javascript">


        $(document).ready(function () {

            $('.btn_buscar').click(function () {
                buscar_datos();
            });

            $('.buscador').keyup(function() {
                buscar_datos();
            });

            function buscar_datos() {

                var buscador = $('.buscador').val();

                if (!buscador) {
                    buscador = 0
                }

                var html = "";

                $.ajax({
                    url: '{{ URL::to("/filtropropietario/") }}/' + buscador,
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

                            $url = '{{ URL::to("/propiedades/") }}/' + data.data[i].propietario_id + '/propietario';

                            html += "<tr>";
                            html += "<td class='TableCheckbox'>";
                            html += "<input name='check[" + data.data[i].id + "]' type='checkbox' data-id='" + data.data[i].id + "'>";
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
                            html += "<div class='col-md-1'><h6>Propiedad<i>:</i></h6>";
                            html += "<p>" + data.data[i].num_propiedades + "</p>";

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
                            " class='btn btn-white' data-toggle='modal' data-target='#modal_propietario_edit'>Editar</button>";

                            html += "<button type='button' data-idpropietario=" + data.data[i].propietario_id + " " +
                                " data-email=" + data.data[i].email + " class='btn btn-white' " +
                                " data-toggle='modal' data-target='#modal_mail'>Enviar mail </button>";

                            html += "<button type='button' " +
                                " data-per_apellido=" + data.data[i].apellido + "" +
                                " data-per_nombre=" + data.data[i].nombre + " " +
                                " data-per_dni=" + data.data[i].dni + " " +
                                " data-per_email=" + data.data[i].email + " " +
                                " data-per_tel_fijo=" + data.data[i].tel_fijo + " " +
                                " data-per_tel_cel=" + data.data[i].tel_cel + " " +
                                " data-per_domicilio=" + data.data[i].domicilio + " " +
                                " data-per_id=" + data.data[i].id + " " +
                                " class='btn btn-white' data-toggle='modal' data-target='#modal_propietario_eliminar'>Eliminar";
                            html += "</button>";

                            html += "</div>";
                            html += "<div class='btn-group btn-group-large' role='group'>";
                            html += "<a href='" + $url + "' type='button' class='btn btn-white'";
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

        $('#modal_propietario_eliminar').on('show.bs.modal', function (e) {

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

            $("#idpropiestario").attr('action', per_id);

        });

        //Finaliza el modal de eliminar

        //Inicia el modal de edit

        $('#modal_propietario_edit').on('show.bs.modal', function (e) {

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