<!-- Modal Nuevo Propietario -->
<div class="modal modal-tasacion fade modal-responsive" id="modal_cliente_create" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header modal-header--orange">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-login-label">Nuevo Cliente</h4>
            </div>

            {!! Form::open(array('route' => ['cliente.store', 'method' => 'POST'],'id' => 'form_cliente_create')) !!}

            {!! Form::text('url', URL::to('/'),["style" =>"display: none"]) !!}

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-4">
                            {!! Form::label('per_apellido', 'Apellido') !!}
                            <div class="form-group">
                                {!! Form::text('per_apellido', null , ['class' => 'form-control apellido','placeholder' => 'Ingrese Apellido']) !!}
                                <p class="help-inline"></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            {!! Form::label('per_nombre', 'Nombre') !!}
                            <div class="form-group">
                                {!! Form::text('per_nombre', null , ['class' => 'form-control nombre','placeholder' => 'Ingrese Nombre']) !!}
                                <p class="help-inline"></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            {!! Form::label('per_dni', 'DNI') !!}
                            <div class="form-group">
                                {!! Form::text('per_dni', null , ['class' => 'form-control dni','placeholder' => 'Ingrese DNI']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            {!! Form::label('per_email', 'Email') !!}
                            <div class="form-group">
                                {!! Form::text('per_email', null , ['class' => 'form-control email','placeholder' => 'Ingrese Email']) !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            {!! Form::label('per_tel_fijo', 'Teléfono Fijo') !!}
                            <div class="form-group">
                                {!! Form::text('per_tel_fijo', null , ['class' => 'form-control tel_fijo','placeholder' => 'Ingrese Teléfono Fijo']) !!}
                                <p class="help-inline"></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            {!! Form::label('per_tel_cel', 'Teléfono Celular ') !!}
                            <div class="form-group">
                                {!! Form::text('per_tel_cel', null , ['class' => 'form-control tel_cel','placeholder' => 'Ingrese Teléfono Celular']) !!}
                                <p class="help-inline"></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::label('per_domicilio', 'Domicilio ') !!}
                            <div class="form-group">
                                {!! Form::text('per_domicilio', null , ['class' => 'form-control domicilio','placeholder' => 'Ingrese Domicilio']) !!}
                                <p class="help-inline"></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            {!! Form::label('password', 'Password ') !!}
                            <div class="form-group">
                                {!! Form::text('password', str_random(10) , ['class' => 'form-control','placeholder' => 'Password']) !!}
                                <p class="help-inline"></p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-blue pull-right">Crear Cliente</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>