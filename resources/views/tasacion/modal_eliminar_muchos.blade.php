<!-- Modal Tipo de Aviso -->
<div class="modal modal-responsive modal-ads-type fade" id="modal_eliminar_muchos" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header modal-header--orange">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-login-label">Eliminar Tasación</h4>
            </div>
            {!! Form::model($tasacion,['method' => 'PATCH','route'=>['tasacion.update','id'=>'idtasacion']]) !!}

            <div class="modal-body">

                {!! Form::hidden('name_tipo_botom_superior', null , ['class' => 'tipo_botom_superior']) !!}

                {!! Form::hidden('idtipo', 3) !!}

                {!! Form::hidden('idmodal', 1) !!}

                <p>Seguro desea eliminar las siguientes tasaciones?</p>
                <div class="holder"></div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-blue pull-right">Eliminar</button>
                <button type="button" class="btn btn-default pull-right cancelar" data-dismiss="modal">Cancelar</button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>