<!-- Modal Tipo de Aviso -->
<div class="modal modal-responsive modal-ads-type fade" id="modal_tipo_aviso" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header modal-header--orange">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-login-label">Destacar Home</h4>
            </div>
            {!! Form::model($propiedad,['method' => 'PATCH','route'=>['propiedad.update','id'=>'idpropiedad']]) !!}

                <div class="modal-body">

                    <div class="pub_id">
                        {!! Form::hidden('pub_id', null) !!}
                    </div>

                    {!! Form::hidden('idtipo', 1) !!}

                    <div class="btn-group btn-group-justified" data-toggle="buttons">
                        <label class="btn btn-simple aviso1 aviso-todos">
                            <input type="radio" name="aviso_id" value="1" id="option1" autocomplete="off"> <span>AVISO <b>SIMPLE</b></span>
                        </label>
                        <label class="btn btn-outstand aviso2 aviso-todos">
                            <input type="radio" name="aviso_id" value="2" id="option2" autocomplete="off"> <span>AVISO <b>DESTACADO</b></span>
                        </label>
                        <label class="btn btn-premium aviso3 aviso-todos">
                            <input type="radio" name="aviso_id" value="3" id="option3" autocomplete="off"> <span>AVISO <b>PREMIUM</b></span>
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-blue pull-right">GUARDAR</button>
                    <button type="button" class="btn btn-default pull-right cancelar" data-dismiss="modal">Cancelar</button>
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>


{{-- {{ $product_attribute->meterial == 'Aluminum' ? 'checked' : '' }}--}}
