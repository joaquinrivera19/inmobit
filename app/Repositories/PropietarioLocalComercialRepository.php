<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 24/8/17
 * Time: 19:43
 */

namespace App\Repositories;


use App\Entities\PropietarioLocalComercial;

class PropietarioLocalComercialRepository
{
    public function getPropietarioLocalComercialAll()
    {
        return PropietarioLocalComercial::all();
    }

}