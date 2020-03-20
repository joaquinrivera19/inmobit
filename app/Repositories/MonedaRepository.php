<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 24/8/17
 * Time: 16:48
 */

namespace App\Repositories;


use App\Entities\Moneda;

class MonedaRepository
{
    public function getMonedaAll()
    {
        return Moneda::pluck('mon_abrevia','mon_id');
    }

}