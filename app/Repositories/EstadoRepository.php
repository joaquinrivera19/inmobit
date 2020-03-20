<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 24/8/17
 * Time: 16:41
 */

namespace App\Repositories;
use Illuminate\Support\Facades\DB;

use App\Entities\Estado;

class EstadoRepository
{
    public function getEstadoAll()
    {
        return Estado::all();
    }

    public function getEstadoPublicacion()
    {
        $return = [''=>'Estado'] + DB::table('estado')
                ->select( 'est_nombre', 'est_id')
                ->where('ambito_id','=',1)
                ->orderBy('est_nombre')
                ->pluck('est_nombre','est_id')
                ->all();

        return $return;
    }


}