<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 24/8/17
 * Time: 16:38
 */

namespace App\Repositories;

use App\Entities\Antiguedad;

class AntiguedadRepository
{
    public function getAntiguedadAll()
    {
        return Antiguedad::pluck('antig_nombre','antig_id');
    }

}