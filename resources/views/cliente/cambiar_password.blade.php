@extends('layouts.app')

@section('content')

    <!-- Main Content -->
    <section class="admin-content">
        <div class="container">
            <h2 class="admin-title">Cambiar contraseña</h2>
            <br>
            <br>

            {!! Form::model($users, array('route' => ['perfil.update', $users->id], 'method' => 'PUT', 'enctype' =>'multipart/form-data','class' => 'form-new-prop', 'id' => 'form_password')) !!}

            {!! Form::hidden('idtipo', 2) !!}

            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="label">Contraseña</label>
                        <input id="password" type="password" class="form-control" name="password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                    <div class="form-group">
                        <label for="password-confirm" class="label">Confirmar Contraseña</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        <p class="help-inline"></p>
                    </div>
                </div>
            </div>

            <br><br>
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

    {{--<script type="text/javascript" src="{{ asset('js') }}"></script>--}}

    <script>
        $(document).ready(function () {
            $("#header").sticky({topSpacing: 0});
        });
    </script>


@endsection