<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 25/8/17
 * Time: 18:50
 */

namespace App\Repositories;

use App\Entities\DetalleFactura;

class DetalleFacturaRepository
{
    public function getDetalleFacturaAll()
    {
        return DetalleFactura::all();
    }

}