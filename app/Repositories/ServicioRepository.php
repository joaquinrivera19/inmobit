<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 24/8/17
 * Time: 17:00
 */

namespace App\Repositories;


use App\Entities\Servicio;

class ServicioRepository
{
    public function getServicioAll()
    {
        return Servicio::pluck('serv_nombre','serv_id');
    }

}