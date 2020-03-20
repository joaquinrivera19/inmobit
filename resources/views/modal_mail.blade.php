<!-- Modal Enviar Ficha -->
<div class="modal modal-responsive modal-mail fade" id="modal_mail" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header modal-header--orange">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modal-login-label">Enviar Mail</h4>
            </div>

            {!! Form::open(array('url' => 'valor_dinamico','method' => 'post', 'class' => 'modal_mail_form')) !!}

            <div class="modal-body">

                {!! Form::hidden('modal_email', 1 ) !!}

                <div class="id">
                    {!! Form::hidden('id', null) !!}
                </div>

                <div class="mail-table">
                    <table class="data-contact-mail" tabindex="-1">
                        <tbody>
                        <tr>
                            <td width="60px">
                                <label class="label-mail">De: </label>
                            </td>
                            <td colspan="2">
                                <input name="de_email" class="form-control-mail" value="{{ $email_local_comercial }}">
                            </td>
                        </tr>
                        <tr>
                            <td width="60px">
                                <label class="label-mail">Para: </label>
                            </td>
                            <td colspan="2" class="email">
                                <input name="para_email" class="form-control-mail">
                            </td>
                            <td width="110px" class="action-mail-container">
                                <div class="action-mail">
                                    <a data-toggle="collapse" href="#Show-CC" aria-expanded="false"
                                       aria-controls="Show-CC" tabindex="1"><i class="fa fa-plus"></i> CC</a>
                                    <a data-toggle="collapse" href="#Show-CCO" aria-expanded="false"
                                       aria-controls="Show-CCO" tabindex="1"><i class="fa fa-plus"></i> CCO</a>
                                </div>
                            </td>
                        </tr>
                        <tr class="action-mail-mobile-container">
                            <td colspan="3">
                                <div class="action-mail-mobile">
                                    <a data-toggle="collapse" href="#Show-CC" aria-expanded="false"
                                       aria-controls="Show-CC" tabindex="1"><i class="fa fa-plus"></i> CC</a>
                                    <a data-toggle="collapse" href="#Show-CCO" aria-expanded="false"
                                       aria-controls="Show-CCO" tabindex="1"><i class="fa fa-plus"></i> CCO</a>
                                </div>
                            </td>
                        </tr>
                        <tr class="collapse" id="Show-CC">
                            <td width="60px">
                                <label class="label-mail">CC: </label>
                            </td>
                            <td colspan="2">
                                <input name="cc_email" class="form-control-mail">
                            </td>
                        </tr>
                        <tr class="collapse" id="Show-CCO">
                            <td width="60px">
                                <label class="label-mail">CCO: </label>
                            </td>
                            <td colspan="2">
                                <input name="cco_email" class="form-control-mail">
                            </td>
                        </tr>
                        <tr id="CCO">
                            <td width="60px">
                                <label class="label-mail">Asunto: </label>
                            </td>
                            <td colspan="2">
                                <input name="asunto_email" class="form-control-mail">

                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="boby-mail">
                    <textarea class="ckeditor" name="cuerpo_email" id="editor1" rows="10" cols="80"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-xs-6">
                    </div>
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-blue pull-right">ENVIAR</button>
                        <button type="button" class="btn btn-default pull-right cancelar" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
</div>