<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 24/8/17
 * Time: 17:07
 */

namespace App\Repositories;
use Illuminate\Support\Facades\DB;

use App\Entities\TipoOperacion;

class TipoOperacionRepository
{

    public function getTipoOperacionAll()
    {
        $return = [''=>'Operación'] + DB::table('tipo_operacion')
                ->select( 'tipopera_nombre', 'tipopera_id')
                ->orderBy('tipopera_nombre')
                ->pluck('tipopera_nombre','tipopera_id')
                ->all();

        return $return;
    }

}