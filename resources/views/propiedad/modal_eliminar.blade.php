<!-- Modal Tipo de Aviso -->
<div class="modal modal-responsive modal-ads-type fade" id="modal_eliminar" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header modal-header--orange">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-login-label">Eliminar Propiedad</h4>
            </div>
            {!! Form::model($propiedad,['method' => 'PATCH','route'=>['propiedad.update','id'=>'idpropiedad']]) !!}

                <div class="modal-body">

                    {!! Form::hidden('pub_id', null, [ 'class' => 'pub_id' ]) !!}

                    {!! Form::hidden('idtipo', 3) !!}

                    <p>Seguro desea eliminar la propiedad <span class="idpub"></span> ?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-blue pull-right">Eliminar</button>
                    <button type="button" class="btn btn-default pull-right cancelar" data-dismiss="modal">Cancelar</button>
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>