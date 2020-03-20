<div class="modal modal-query fade" id="modal-query" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header modal-header--orange">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-login-label">Estamos aquí para ayudarte en lo que necesites</h4>
            </div>
            {!! Form::open(array('url' => 'comentario','method' => 'post')) !!}

                <div class="modal-body">
                    <textarea type="textarea" name="text_consulta" class="textarea-query" id="inset-query" placeholder="Envianos tu consulta..."></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-blue pull-right">ENVIAR</button>
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>