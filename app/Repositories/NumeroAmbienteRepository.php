<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 24/8/17
 * Time: 16:49
 */

namespace App\Repositories;


use App\Entities\NumeroAmbiente;

class NumeroAmbienteRepository
{
    public function getNumeroAmbienteAll()
    {
        return NumeroAmbiente::pluck('numamb_nombre','numamb_id');
    }

}