<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 24/8/17
 * Time: 16:47
 */

namespace App\Repositories;

use App\Entities\Provincia;
use Illuminate\Support\Facades\DB;

class ProvinciaRepository
{
    public function getProvinciaAll()
    {

        $provincia = [''=>'Seleccione una Provincia'] + DB::table('provincia')
                ->pluck('prov_nombre','prov_id')
                ->all();

        return $provincia;
    }

}