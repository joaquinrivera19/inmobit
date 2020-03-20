<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 24/8/17
 * Time: 16:59
 */

namespace App\Repositories;
use Illuminate\Support\Facades\DB;

use App\Entities\Publicacion;

class PublicacionRepository
{
    public function getPublicacionAll()
    {
        return Publicacion::all();
    }

    public function getPublicacionId($id)
    {
        return DB::table('publicacion')
            /*          ->select('propiedad.prop_direccion as prop_direccion', 'localidad.loc_nombre as loc_nombre','publicacion.pub_id as pub_id',
                          'tipo_operacion.tipopera_nombre as tipopera_nombre','tipo_inmueble.tipoinmu_nombre as tipoinmu_nombre',
                          'propiedad.prop_valor as prop_valor','propiedad.prop_comision as prop_comision',
                          'estado.est_id as est_id','estado.est_nombre as est_nombre',
                          'tipo_aviso.aviso_id as aviso_id','tipo_aviso.aviso_nombre as aviso_nombre')*/
            ->Join('propiedad','propiedad.prop_id','=','publicacion.prop_id')
            ->Join('localidad','localidad.loc_id','=','propiedad.loc_id')
            ->Join('propietario','propietario.propietario_id','=','propiedad.propietario_id')
            ->Join('persona','propietario.per_id','=','persona.per_id')
            ->where('publicacion.pub_id','=',$id)
            ->first();
    }


}