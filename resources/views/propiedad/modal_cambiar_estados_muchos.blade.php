<!-- Modal Tipo de Estado -->
<div class="modal modal-responsive modal-ads-status fade" id="modal_cambiar_estados_muchos" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header modal-header--orange">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-login-label">Cambiar Estado Web</h4>
            </div>
            {!! Form::model($propiedad,['method' => 'PATCH','route'=>['propiedad.update','id'=>'idpropiedad']]) !!}

            <div class="modal-body">

                {!! Form::hidden('name_tipo_botom_superior', null , ['class' => 'tipo_botom_superior']) !!}

                {!! Form::hidden('idtipo', 2) !!}

                {!! Form::hidden('idmodal', 1) !!}

                <p>Seguro desea cambiar el estado a las propiedades?</p>

                <div class="btn-group btn-group-justified" data-toggle="buttons">
                    <label class="btn btn-white estado1 estado-todos">
                        <input type="radio" name="est_id" value="1" id="option1" autocomplete="off"> <span>Publicada</span>
                    </label>
                    <label class="btn btn-white estado2 estado-todos">
                        <input type="radio" name="est_id" value="2" id="option2" autocomplete="off"> <span>No publicada</span>
                    </label>
                    <label class="btn btn-white estado3 estado-todos">
                        <input type="radio" name="est_id" value="3" id="option3" autocomplete="off"> <span>Alquilada</span>
                    </label>
                    <label class="btn btn-white estado4 estado-todos">
                        <input type="radio" name="est_id" value="4" id="option4" autocomplete="off"> <span>Vendido</span>
                    </label>
                </div>

            </br><div class="holder"></div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-blue pull-right">GUARDAR</button>
                <button type="button" class="btn btn-default pull-right cancelar" data-dismiss="modal">Cancelar</button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>