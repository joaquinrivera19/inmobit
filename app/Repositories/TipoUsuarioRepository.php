<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 24/8/17
 * Time: 17:08
 */

namespace App\Repositories;


use App\Entities\TipoUsuario;

class TipoUsuarioRepository
{
    public function getTipoUsuarioAll()
    {
        return TipoUsuario::pluck('tipu_nombre','tipu_id');
    }

}