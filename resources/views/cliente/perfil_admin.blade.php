@extends('layouts.app')

@section('style')

@endsection

@section('content')

    <!-- Main Content -->
    <section class="admin-content">
        <div class="container">

            {!! Form::model($local_admin, array('route' => ['perfil.update', $local_admin->per_id], 'method' => 'PUT', 'enctype' =>'multipart/form-data','class' => 'form-new-prop', 'id' => 'form_local_admin')) !!}

            {!! Form::hidden('idtipo', 1) !!}

            {!! Form::hidden('per_id', $local_admin->per_id) !!}

            <h3 class="admin-subtitle-form">Datos usuario Administrador</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">

                        {!! Form::label('per_apellido', 'Apellido: ', ['class' => 'label']) !!}
                        {!! Form::text('per_apellido', $local_admin->per_apellido, ['class' => 'form-control','placeholder' => 'Ingrese Apellido']) !!}

                        <p class="help-inline"></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">

                        {!! Form::label('per_nombre', 'Nombre: ', ['class' => 'label']) !!}
                        {!! Form::text('per_nombre', $local_admin->per_nombre, ['class' => 'form-control','placeholder' => 'Ingrese Nombre']) !!}

                        <p class="help-inline"></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">

                        {!! Form::label('per_dni', 'DNI: ', ['class' => 'label']) !!}
                        {!! Form::text('per_dni', $local_admin->per_dni, ['class' => 'form-control','placeholder' => 'Ingrese DNI']) !!}

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">

                        {!! Form::label('per_email', 'E-mail: ', ['class' => 'label']) !!}
                        {!! Form::text('per_email', $local_admin->per_email, ['class' => 'form-control','placeholder' => 'Ingrese E-mail']) !!}

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">

                        {!! Form::label('per_tel_cel', 'Teléfono: ', ['class' => 'label']) !!}
                        {!! Form::text('per_tel_cel', $local_admin->per_tel_cel, ['class' => 'form-control','placeholder' => 'Ingrese Teléfono']) !!}

                        <p class="help-inline"></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">

                        {!! Form::label('per_domicilio', 'Domicilio: ', ['class' => 'label']) !!}
                        {!! Form::text('per_domicilio', $local_admin->per_domicilio, ['class' => 'form-control','placeholder' => 'Ingrese Dirección']) !!}

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

@endsection