<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 24/8/17
 * Time: 16:52
 */

namespace App\Repositories;


use App\Entities\NumeroCochera;

class NumeroCocheraRepository
{
    public function getNumeroCocheraAll()
    {
        return NumeroCochera::pluck('cochera_nombre','cochera_id');
    }

}