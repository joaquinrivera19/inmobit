<!-- Modal Nueva Tasación -->
<div class="modal modal-tasacion fade modal-responsive" id="modal-tasacion-eliminar" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header modal-header--orange">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-login-label">Seguro desea eliminar la siguiente Tasación?</h4>
            </div>

            {!! Form::model($tasacion,['method' => 'PATCH','route'=>['tasacion.update','id'=>'idtasacion']]) !!}

            <div class="modal-body">

                <div class="per_id">
                    {!! Form::hidden('per_id', null) !!}
                </div>

                <div class="tas_id">
                    {!! Form::hidden('tas_id', null) !!}
                </div>

                <div class="propietario_id">
                    {!! Form::hidden('propietario_id', null) !!}
                </div>

                <div class="prop_id">
                    {!! Form::hidden('prop_id', null) !!}
                </div>

                {!! Form::hidden('idtipo', 2) !!}

                <div class="row">
                    <div class="col-md-4">
                        {!! Form::label('per_apellido', 'Apellido') !!}
                        <div class="form-group per_apellido">
                            {!! Form::text('per_apellido', null , ['class' => 'form-control','readonly' => 'readonly']) !!}
                            <p class="help-inline"></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        {!! Form::label('per_nombre', 'Nombre') !!}
                        <div class="form-group per_nombre">
                            {!! Form::text('per_nombre', null , ['class' => 'form-control','readonly' => 'readonly']) !!}
                            <p class="help-inline"></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        {!! Form::label('per_dni', 'DNI') !!}
                        <div class="form-group per_dni">
                            {!! Form::text('per_dni', null , ['class' => 'form-control','readonly' => 'readonly']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        {!! Form::label('per_email', 'Email') !!}
                        <div class="form-group per_email">
                            {!! Form::text('per_email', null , ['class' => 'form-control','readonly' => 'readonly']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        {!! Form::label('per_tel_fijo', 'Teléfono Fijo') !!}
                        <div class="form-group per_tel_fijo">
                            {!! Form::text('per_tel_fijo', null , ['class' => 'form-control','readonly' => 'readonly']) !!}
                            <p class="help-inline"></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        {!! Form::label('per_tel_cel', 'Teléfono Celular') !!}
                        <div class="form-group per_tel_cel">
                            {!! Form::text('per_tel_cel', null , ['class' => 'form-control','readonly' => 'readonly']) !!}
                            <p class="help-inline"></p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        {!! Form::label('per_domicilio', 'Domicilio') !!}
                        <div class="form-group per_domicilio">
                            {!! Form::text('per_domicilio', null , ['class' => 'form-control','readonly' => 'readonly']) !!}
                            <p class="help-inline"></p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <section class="form-block">
                            <label>Valor tasación</label>
                            <div class="form-group">
                                <div class="row row-xs">
                                    <div class="col-xs-4 col-lg-3">
                                        {!! Form::select('mon_id',$moneda, null, ['class' => 'form-control mon_id', 'disabled' => 'disabled' ]) !!}
                                    </div>
                                    <div class="col-xs-8 col-lg-9 tas_valor_venta">
                                        {!! Form::text('tas_valor_venta', null , ['class' => 'form-control','readonly' => 'readonly']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row row-xs">
                                    <div class="col-xs-4 col-lg-3">
                                        {!! Form::select('mon_id2',$moneda, null, ['class' => 'form-control mon_id', 'disabled' => 'disabled' ]) !!}
                                    </div>
                                    <div class="col-xs-8 col-lg-9 tas_valor_alq">
                                        {!! Form::text('tas_valor_alq', null , ['class' => 'form-control','readonly' => 'readonly']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row row-xs">
                                    <div class="col-xs-4 col-lg-3">
                                        {!! Form::select('mon_id3',$moneda, null, ['class' => 'form-control mon_id', 'disabled' => 'disabled']) !!}
                                    </div>
                                    <div class="col-xs-8 col-lg-9 tas_valor_alq_temp">
                                        {!! Form::text('tas_valor_alq_temp', null , ['class' => 'form-control','readonly' => 'readonly']) !!}
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <section class="form-block">
                            <label>Ubicación</label>
                            <div class="form-group">
                                {!! Form::select('prov_id',$provincia, null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::select('loc_id',$localidad, null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::text('per_domicilio', null , ['class' => 'form-control','readonly' => 'readonly']) !!}
                            </div>
                        </section>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <section class="form-block">
                            {!! Form::label('tipoinmu_id', 'Tipo de Propiedad') !!}
                            <div class="form-group">
                                {!! Form::select('tipoinmu_id',$tipoinmueble, null, ['class' => 'form-control','id' => 'tipoinmu_id','disabled' => 'disabled']) !!}
                            </div>
                        </section>
                        <section class="form-block">
                            {!! Form::label('tas_valor_tasacion', 'Comisión / Costo Tasación') !!}
                            <div class="form-group valor_tasacion">
                                {!! Form::text('tas_valor_tasacion', null , ['class' => 'form-control','readonly' => 'readonly']) !!}
                            </div>
                        </section>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <section class="form-block prop-data">
                            <label>Datos propiedad</label>
                            <div class="row row-xs">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">Amb.</span>
                                            {!! Form::select('numamb_id',$numeroambiente, null, ['class' => 'form-control','style' => 'width: 87px;','id' => 'numamb_id','disabled' => 'disabled']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">Baños</span>
                                            {!! Form::select('ban_id',$numerobanio, null, ['class' => 'form-control','style' => 'width: 87px;','id' => 'ban_id','disabled' => 'disabled']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group prop_dim_construido">
                                            <span class="input-group-addon">M2 Cub.</span>
                                            {!! Form::text('prop_dim_construido', null , ['class' => 'form-control', 'readonly' => 'readonly']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">Dorm.</span>
                                            {!! Form::select('hab_id',$numerohabitacion, null, ['class' => 'form-control','style' => 'width: 87px;', 'id' => 'hab_id','disabled' => 'disabled']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group tas_exp">
                                            <span class="input-group-addon">Exp.</span>
                                            {!! Form::text('tas_exp', null , ['class' => 'form-control','readonly' => 'readonly']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group prop_dim_total">
                                            <span class="input-group-addon">M2 Desc.</span>
                                            {!! Form::text('prop_dim_total', null , ['class' => 'form-control','readonly' => 'readonly']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <section class="form-block">
                            <div class="form-group tas_descripcion">
                                {!! Form::label('tas_descripcion', 'Nota / Comentarios') !!}
                                {!! Form::textarea('tas_descripcion',null,['class'=>'form-control', 'rows' => 6,'readonly' => 'readonly']) !!}
                            </div>
                        </section>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-blue pull-right">Eliminar Tasación</button>
                <button type="button" class="btn btn-default pull-right cancelar" data-dismiss="modal">Cancelar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>