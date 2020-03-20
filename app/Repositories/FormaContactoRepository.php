<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 24/8/17
 * Time: 16:42
 */

namespace App\Repositories;

use App\Entities\FormaContacto;

class FormaContactoRepository
{
    public function getFormaContactoAll()
    {
        return FormaContacto::pluck('cont_nombre','cont_id');
    }

}