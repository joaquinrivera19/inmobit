<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 21/12/17
 * Time: 21:06
 */

namespace App\Entities;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Html2Text\Html2Text;

class Utilities extends Model
{
    public static function getLocalComercialId()
    {
        return Auth::user()->localcomercial->comer_id;
    }

    public static function getLocalComercialEmail()
    {
        $email =  Auth::user()->localcomercial->comer_email;

        if ($email != ""){

            return $email;

        } else {

            $email_user = Auth::user()->email;

            return $email_user;

        }


    }

    public static function getTipoUsuario()
    {
        return Auth::user()->tipu_id;
    }

    public static function envioMail(Request $request,$tipo, $url_propiedades = null)
    {

        $id = $request->input('id');
        $de_email = $request->input('de_email');
        $para_email = $request->input('para_email');
        $cc_email = $request->input('cc_email');
        $cco_email = $request->input('cco_email');
        $asunto_email = $request->input('asunto_email');

        if ($request->input('cuerpo_email')){

            $cuerpo_email = $request->input('cuerpo_email');

        }else{

            $cuerpo_email = $url_propiedades;
        }

        $cuerpo_text = Html2Text::convert($cuerpo_email);

        Mail::send('template_mail', ['tipo' => $tipo, 'id' => $id, 'de_email' => $de_email,
            'para_email' => $para_email, 'asunto_email' => $asunto_email,
            'cuerpo_text' => $cuerpo_text], function ($msj) use ($para_email) {
            $msj->subject('Enviado de Inmobit');
            $msj->to($para_email);
            //$msj->cc('');
        });
    }

}