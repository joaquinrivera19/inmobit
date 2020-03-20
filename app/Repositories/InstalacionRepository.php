<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 24/8/17
 * Time: 16:44
 */

namespace App\Repositories;

use App\Entities\Instalacion;

class InstalacionRepository
{
    public function getInstalacionAll()
    {
        return Instalacion::pluck('inst_nombre','inst_id');
    }

}