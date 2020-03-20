<!-- Modal Tipo de Aviso -->
<div class="modal modal-responsive modal-ads-type fade" id="modal_exportar_muchos" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header modal-header--orange">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-login-label">Exportar a Excel</h4>
            </div>
            {!! Form::model($cliente,['method' => 'PATCH','route'=>['cliente.update','id'=>'comer_id']]) !!}

            <div class="modal-body">

                {!! Form::hidden('name_tipo_botom_superior', null , ['class' => 'tipo_botom_superior']) !!}

                {!! Form::hidden('idtipo', 3) !!}

                {!! Form::hidden('idmodal', 1) !!}

                <p>Seguro desea exportar a excel los clientes?</p>
                <div class="holder"></div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-blue pull-right">Exportar</button>
                <button type="button" class="btn btn-default pull-right cancelar" data-dismiss="modal">Cancelar</button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>