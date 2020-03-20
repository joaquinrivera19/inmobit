<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 24/8/17
 * Time: 16:56
 */

namespace App\Repositories;

use App\Entities\PreguntaFrecuente;

class PreguntaFrecuentaRepository
{
    public function getPreguntaFrecuenteAll()
    {
        return PreguntaFrecuente::all();
    }

}