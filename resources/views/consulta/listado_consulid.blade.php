@extends('layouts.app')

@section('content')

    <!-- Main Content -->
    <section class="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="admin-title">Consultas a la propiedad: {{ $idpropiedad }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">

                @if ($consultas->count() == 0)

                    <!-- Cartel "no hay propiedades" -->
                        <div class="no-properties">
                            <h1 class="admin-title-big">Todavía no recibió ninguna consulta.</h1>
                            <p>
                                {{--<button type="button" class="btn-lg btn btn-blue" data-toggle="modal"
                                        data-target="#modal_consulta_create"><i
                                            class="fa fa-plus-circle"></i>
                                    CARGAR CONSULTA
                                </button>--}}
                            </p>
                        </div>
                        <!-- fin cartel "no hay propiedades" -->

                @else

                    <!-- Tabla de propiedades -->
                        <div class="admin-table">
                            <div class="header-table header-table-propietarios">
                                <div class="row">
                                    {{--<div class="col-xs-12 hidden-sm hidden-md hidden-lg">
                                        <button type="button" class="btn btn-blue tasacion-btn-mobile"
                                                data-toggle="modal"
                                                data-target="#modal_consulta_create">CARGAR CONSULTA
                                        </button>
                                    </div>--}}
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
                                                {{--<li>
                                                    <button type="button" class="btn btn-blue" data-toggle="modal"
                                                            data-target="#modal_consulta_create">CARGAR CONSULTA
                                                    </button>
                                                </li>--}}
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
                                                <input type="text" class="form-control"
                                                       placeholder="Buscar por nombre, mail o teléfono">
                                                <span class="input-group-btn">
												<button class="btn btn-blue" type="button"><i class="fa fa-search"></i></button>
											  </span>
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
                                                        {{--<button type="button" data-idconsulta="{!! $consulta->idconsulta !!}"
                                                                data-email="{!! $consulta->email !!}"
                                                                class="btn btn-white" data-toggle="modal"
                                                                data-target="#modal_mail">Enviar mail
                                                        </button>--}}

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
                                                        {{--<a href="{{ url('getexportacionconsultaid_pdf/'.$consulta->id) }}"
                                                           type="button" class="btn btn-white" style="padding-top: 12px" target="_blank">Exporta PDF
                                                        </a>--}}

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

    {{--@include('consulta.modal_create')--}}

    @if ($consultas->count() != 0)

        @include('consulta.modal_edit')
        @include('consulta.modal_eliminar')
        {{--@include('modal_mail')--}}

       {{-- @include('consulta.modal_eliminar_muchos')--}}

    @endif

@endsection

@section('scripts')

    <script type="text/javascript" src="{{ asset('js/validate_consulta.js') }}"></script>

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

    </script>

@endsection