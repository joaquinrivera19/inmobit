<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 24/8/17
 * Time: 16:46
 */

namespace App\Repositories;

use App\Entities\Localidad;

class LocalidadRepository
{
    public function getLocalidadAll()
    {
        return Localidad::pluck('loc_nombre','loc_id');
    }

}