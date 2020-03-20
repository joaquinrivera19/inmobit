<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 24/8/17
 * Time: 16:53
 */

namespace App\Repositories;
use Illuminate\Support\Facades\DB;

use App\Entities\NumeroHabitacion;

class NumeroHabitacionRepository
{

    public function getNumeroHabitacionAll()
    {
        $return = [''=>'Dormitorios'] + DB::table('num_habitacion')
                ->select( 'hab_nombre', 'hab_id')
                ->orderBy('hab_nombre')
                ->pluck('hab_nombre','hab_id')
                ->all();

        return $return;
    }

}