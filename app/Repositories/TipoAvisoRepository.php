<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 24/8/17
 * Time: 17:04
 */

namespace App\Repositories;


use App\Entities\TipoAviso;

class TipoAvisoRepository
{
    public function getTipoAvisoAll()
    {
        return TipoAviso::pluck('aviso_nombre','aviso_id');
    }

    public function getTipoAviso()
    {
        return TipoAviso::all();
    }

}