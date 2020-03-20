@extends('layouts.app')

@section('style')

    <style type="text/css">

        .dropzone:after {
            content: "Arrastra y suelta una imágen dentro de éste módulo";
            display: inline-block;
            position: absolute;
            width: 100%;
            color: #999;
            text-transform: uppercase;
            margin: auto;
            bottom: 10px;
            left: 0;
            right: 0;
        }

        @media screen and (max-width: 767px) {
            .dropzone:after {
                content: "Arrastra y suelta una imágen dentro de éste módulo";
                display: inline-block;
                position: absolute;
                width: 100%;
                font-size: 13px;
                color: #999;
                text-transform: uppercase;
                margin: auto;
                bottom: 10px;
                left: 0;
                right: 0;
                padding: 0 20px;
            }
        }

    </style>

@endsection

@section('content')

    <!-- Main Content -->
    <section class="admin-content">
        <div class="container">

            {!! Form::model($localcomercial, array('route' => ['perfil.update', $localcomercial->comer_id], 'method' => 'PUT', 'enctype' =>'multipart/form-data','class' => 'form-new-prop', 'id' => 'form_localcomercial')) !!}

            {!! Form::hidden('idtipo', 1) !!}

            {!! Form::hidden('per_id', $localcomercial->per_id) !!}
            {!! Form::hidden('propcomer_id', $localcomercial->propcomer_id) !!}
            {!! Form::hidden('comer_id', $localcomercial->comer_id) !!}

            <h2 class="admin-title">Datos comerciales</h2>
            <div class="row">
                <div class="col-xs-12">
                    <div class="dropzone" id="dropzoneFileUpload">
                    </div>
                </div>
            </div>

            <br>
            <br>

            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                        {!! Form::label('comer_nombre', 'Nombre Comercial', ['class' => 'label']) !!}
                        {!! Form::text('comer_nombre', $localcomercial->comer_nombre , ['class' => 'form-control','placeholder' => 'Nombre Comercial']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('comer_direccion', 'Dirección Comercial', ['class' => 'label']) !!}
                        {!! Form::text('comer_direccion', $localcomercial->comer_direccion, ['class' => 'form-control','placeholder' => 'Dirección Comercial']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('comer_cuit', 'Cuit', ['class' => 'label']) !!}
                        {!! Form::text('comer_cuit', $localcomercial->comer_cuit, ['class' => 'form-control','placeholder' => 'Cuit']) !!}
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('comer_piso', 'Piso', ['class' => 'label']) !!}
                        {!! Form::text('comer_piso', $localcomercial->comer_piso , ['class' => 'form-control','placeholder' => 'Piso']) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('comer_depto', 'Departamento', ['class' => 'label']) !!}
                        {!! Form::text('comer_depto', $localcomercial->comer_depto , ['class' => 'form-control','placeholder' => 'Departamento']) !!}
                        <p class="help-inline"></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('comer_codpostal', 'Código Postal', ['class' => 'label']) !!}
                        {!! Form::text('comer_codpostal', $localcomercial->comer_codpostal, ['class' => 'form-control','placeholder' => 'Código Postal']) !!}
                        <p class="help-inline"></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                    <div class="form-group">
                        <label class="label">Provincia</label>
                        <input type="text" id="barrio" class="form-control"/>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                    <div class="form-group">
                        <label class="label">Ciudad</label>
                        <input type="text" id="barrio" class="form-control"/>
                        <p class="help-inline"></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                    <div class="form-group">
                        {!! Form::label('comer_tel_fijo', 'Teléfono Fijo', ['class' => 'label']) !!}
                        {!! Form::text('comer_tel_fijo', $localcomercial->comer_tel_fijo , ['class' => 'form-control','placeholder' => 'Teléfono Fijo']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                    <div class="form-group">
                        {!! Form::label('comer_tel_cel', 'Teléfono Celular', ['class' => 'label']) !!}
                        {!! Form::text('comer_tel_cel', $localcomercial->comer_tel_cel , ['class' => 'form-control','placeholder' => 'Teléfono Celular']) !!}
                        <p class="help-inline"></p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-6">
                    <div class="form-group label-empty">
                        <label class="label"></label>
                        <p class="help-inline">Los números ingresados serán utilizados por defecto en los avisos que
                            publiques, pudiendo modificarlos posteriormente.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                    <div class="form-group">
                        {!! Form::label('comer_web', 'Web Comercial', ['class' => 'label']) !!}
                        {!! Form::text('comer_web', $localcomercial->comer_web , ['class' => 'form-control','placeholder' => 'Web Comercial']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                    <div class="form-group">
                        {!! Form::label('comer_email', 'Email Comercial', ['class' => 'label']) !!}
                        {!! Form::text('comer_email', $localcomercial->comer_email , ['class' => 'form-control','placeholder' => 'Email Comercial']) !!}
                        <p class="help-inline"></p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-6">
                    <div class="form-group label-empty">
                        <label class="label"></label>
                        <p class="help-inline">La dirección web y mail cargados serán utilizados por defecto en los
                            avisos que publiques, pudiendo modificarlos posteriormente.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                @if ($localcomercial->comer_poseo_web == 1)
                                    {!!  Form::checkbox('comer_poseo_web', '1', true) !!}
                                @else
                                    {!!  Form::checkbox('comer_poseo_web', '0', false) !!}
                                @endif
                                No poseo web, me interesaría tener una.
                            </label>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    {!!  Form::checkbox('comer_novedades', '1', false) !!} Acepto recibir novedades
                                    del portal.
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <h3 class="admin-subtitle-form">Datos persona de contacto</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">

                        {!! Form::label('per_apellido', 'Apellido: ', ['class' => 'label']) !!}
                        {!! Form::text('per_apellido', $localcomercial->per_apellido, ['class' => 'form-control','placeholder' => 'Ingrese Apellido']) !!}

                        <p class="help-inline"></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">

                        {!! Form::label('per_nombre', 'Nombre: ', ['class' => 'label']) !!}
                        {!! Form::text('per_nombre', $localcomercial->per_nombre, ['class' => 'form-control','placeholder' => 'Ingrese Nombre']) !!}

                        <p class="help-inline"></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">

                        {!! Form::label('per_dni', 'DNI: ', ['class' => 'label']) !!}
                        {!! Form::text('per_dni', $localcomercial->per_dni, ['class' => 'form-control','placeholder' => 'Ingrese DNI']) !!}

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">

                        {!! Form::label('per_email', 'E-mail: ', ['class' => 'label']) !!}
                        {!! Form::text('per_email', $localcomercial->per_email, ['class' => 'form-control','placeholder' => 'Ingrese E-mail']) !!}

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">

                        {!! Form::label('per_tel_cel', 'Teléfono: ', ['class' => 'label']) !!}
                        {!! Form::text('per_tel_cel', $localcomercial->per_tel_cel, ['class' => 'form-control','placeholder' => 'Ingrese Teléfono']) !!}

                        <p class="help-inline"></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">

                        {!! Form::label('per_domicilio', 'Domicilio: ', ['class' => 'label']) !!}
                        {!! Form::text('per_domicilio', $localcomercial->per_domicilio, ['class' => 'form-control','placeholder' => 'Ingrese Dirección']) !!}

                        <p class="help-inline"></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-large btn-orange">Guardar</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </section>

@endsection

@section('scripts')

    <script type="text/javascript" src="{{ asset('js/validate_localcomercial.js') }}"></script>

    <script>
        $(document).ready(function () {
            $("#header").sticky({topSpacing: 0});
        });
    </script>

    <script type="text/javascript">
        var baseUrl = "{{ url('/') }}";
        var token = "{{ csrf_token() }}";
        var comer_id = $('input:hidden[name=comer_id]').val();

        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("div#dropzoneFileUpload", {
            url: baseUrl + "/localcomercial/uploadFiles",
            addRemoveLinks: true,
            maxFilesize: 4, // MB
            maxFiles: 1,
            paramName: "file", // The name that will be used to transfer the file
            acceptedFiles: ".jpeg,.jpg,.png",
            dictDefaultMessage: "<i class='fa fa-plus-circle'></i>Agregar Imágen",
            dictFallbackMessage: "Su navegador no admite archivos subidos por drag'n'drop.",
            dictInvalidFileType: "No puedes subir archivos de este tipo.",
            dictCancelUpload: "Cancelar la subida",
            dictCancelUploadConfirmation: "¿Seguro que quieres cancelar esta subida?",
            dictRemoveFile: "Remover Archivo",
            dictMaxFilesExceeded: "No puedes subir más archivos.",
            params: {
                _token: token,
                comer_id: comer_id
            }
        });
    </script>


@endsection