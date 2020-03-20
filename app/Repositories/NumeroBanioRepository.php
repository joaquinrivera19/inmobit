<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 24/8/17
 * Time: 16:51
 */

namespace App\Repositories;


use App\Entities\NumeroBanio;

class NumeroBanioRepository
{
    public function getNumeroBanioAll()
    {
        return NumeroBanio::pluck('ban_nombre','ban_id');
    }

}