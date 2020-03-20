<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 24/8/17
 * Time: 17:03
 */

namespace App\Repositories;

use App\Entities\TipoAbono;

class TipoAbonoRepository
{
    public function getTipoAbonoAll()
    {
        return TipoAbono::pluck('abono_nombre','abono_id');
    }

}