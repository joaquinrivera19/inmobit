<!-- Modal Nuevo Interesado -->
<div class="modal modal-tasacion fade modal-responsive" id="modal_consulta_edit" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header modal-header--orange">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-login-label">Editar Consulta</h4>
            </div>

            {!! Form::model($consulta,['method' => 'PATCH','route'=>['consulta.update','id'=>'idpropiestario'],'id' => 'form_consulta_edit']) !!}

            {!! Form::text('url', URL::to('/'),["style" =>"display: none"]) !!}

            <div class="modal-body">

                <div class="per_id">
                    {!! Form::hidden('per_id', null) !!}
                </div>

                <div class="idconsulta">
                    {!! Form::hidden('idconsulta', null) !!}
                </div>

                {!! Form::hidden('idtipo', 1) !!}

                <div class="row">
                    <div class="col-md-6">
                        <section class="form-block">
                            <label>Datos del interesado</label>
                            <div class="form-group per_apellido">
                                {!! Form::text('per_apellido', null , ['class' => 'form-control apellido','placeholder' => 'Ingrese Apellido']) !!}
                            </div>
                            <div class="form-group per_nombre">
                                {!! Form::text('per_nombre', null , ['class' => 'form-control nombre','placeholder' => 'Ingrese Nombre']) !!}
                            </div>
                            <div class="form-group per_dni">
                                {!! Form::text('per_dni', null , ['class' => 'form-control dni','placeholder' => 'Ingrese DNI']) !!}
                            </div>
                            <div class="form-group per_tel_fijo">
                                {!! Form::text('per_tel_fijo', null , ['class' => 'form-control tel_fijo','placeholder' => 'Ingrese Teléfono']) !!}
                            </div>
                        </section>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <section class="form-block">
                            <label>¿Cómo nos contactó?</label>
                            <div class="form-group">
                                <div class="btn-group btn-group-justified btn-group-contact"
                                     data-toggle="buttons">

                                    <label class="btn btn-white edit_primero">
                                        {!!  Form::radio('cont_id', '1', false) !!}
                                        <i class="fa fa-2x fa-phone"></i>
                                        <span>Teléfono</span>
                                    </label>

                                    <label class="btn btn-white edit_segundo">
                                        {!!  Form::radio('cont_id', '2', false) !!}
                                        <i class="fa fa-2x fa-male"></i>
                                        <span>Local</span>
                                    </label>

                                    <label class="btn btn-white edit_tercero">
                                        {!!  Form::radio('cont_id', '3', false) !!}
                                        <i class="fa fa-2x fa-envelope"></i>
                                        <span>Email</span>
                                    </label>

                                </div>
                            </div>
                            <div class="form-group per_email">
                                {!! Form::text('per_email', null , ['class' => 'form-control email','placeholder' => 'Ingrese Email']) !!}
                            </div>

                            <div class="form-group per_domicilio">
                                {!! Form::text('per_domicilio', null , ['class' => 'form-control domicilio','placeholder' => 'Ingrese Domicilio']) !!}
                            </div>
                        </section>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <section class="form-block">
                            <div class="form-group per_mensaje">
                                <label>Nota / Comentarios</label>
                                {!! Form::textarea('cons_mensaje',null,['class'=>'form-control', 'rows' => 6]) !!}
                            </div>
                        </section>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-blue pull-right">Editar Consulta</button>
                <button type="button" class="btn btn-default pull-right cancelar" data-dismiss="modal">Cancelar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>