<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 24/8/17
 * Time: 17:06
 */

namespace App\Repositories;
use Illuminate\Support\Facades\DB;

use App\Entities\TipoInmueble;

class TipoInmuebleRepository
{

    public function getTipoInmuebleAll()
    {
        $return = [''=>'Tipo de Propiedad'] + DB::table('tipo_inmueble')
                ->select( 'tipoinmu_nombre', 'tipoinmu_id')
                ->orderBy('tipoinmu_nombre')
                ->pluck('tipoinmu_nombre','tipoinmu_id')
                ->all();

        return $return;
    }

}