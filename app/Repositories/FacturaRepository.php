<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 25/8/17
 * Time: 18:49
 */

namespace App\Repositories;

use App\Entities\Factura;

class FacturaRepository
{
    public function getFacturaAll()
    {
        return Factura::all();
    }

}