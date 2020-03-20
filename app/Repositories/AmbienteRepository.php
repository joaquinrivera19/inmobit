<?php

/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 24/8/17
 * Time: 16:33
 */

namespace App\Repositories;

use App\Entities\Ambiente;

class AmbienteRepository
{
    public function getAmbienteAll()
    {
        return Ambiente::pluck('amb_nombre','amb_id');
    }

}