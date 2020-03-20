<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 25/8/17
 * Time: 18:52
 */

namespace App\Repositories;


use App\Entities\FormaPago;

class FormaPagoRepository
{
    public function getFormaPagoAll()
    {
        return FormaPago::pluck('forpago_nombre','forpago_id');
    }

}