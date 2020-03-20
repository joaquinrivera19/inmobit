<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 24/8/17
 * Time: 16:58
 */

namespace App\Repositories;

use App\Entities\Propietario;
use Illuminate\Support\Facades\DB;

class PropietarioRepository
{
    public function getPropietarioAll($idlocal_comercial)
    {
        return DB::table('propietario as pro')
            ->select(DB::raw("(select COUNT(propi.prop_id) from propiedad as propi
                    where propi.propietario_id=pro.propietario_id
                    GROUP BY pro.propietario_id) as num_propiedades"),
                'persona.per_dni as dni','persona.per_apellido as apellido','persona.per_nombre as nombre',
                'persona.per_tel_fijo as tel_fijo','persona.per_tel_cel as tel_cel',
                'persona.per_email as email', 'persona.per_domicilio as domicilio','persona.per_id as id',
                'pro.propietario_id as propietario_id')
            ->Join('persona','persona.per_id','=','pro.per_id')
            ->Join('local_comercial','local_comercial.comer_id','=','pro.comer_id')
            ->where('persona.est_id','=','8')
            ->where('local_comercial.comer_id','=',$idlocal_comercial)
            ->where('persona.per_tasacion','=',0)
            ->OrderBy('pro.propietario_id','desc')
            ->paginate(15);

    }

    public function getPropietarioExportacion($idpropietario)
    {
        return DB::table('propietario as pro')
            ->select('persona.per_apellido as Apellido','persona.per_nombre as Nombre','persona.per_dni as DNI',
                'persona.per_tel_fijo as Tel Fijo','persona.per_tel_cel as Tel Cel',
                'persona.per_email as Email', 'persona.per_domicilio as Domicilio',
                DB::raw("(select COUNT(propi.prop_id) from propiedad as propi
                    where propi.propietario_id=pro.propietario_id
                    GROUP BY pro.propietario_id) as Cantidad_de_Propiedades"))
            ->Join('persona','persona.per_id','=','pro.per_id')
            ->Join('local_comercial','local_comercial.comer_id','=','pro.comer_id')
            ->where('persona.est_id','=','8')
            ->where('persona.per_id','=',$idpropietario)
            ->OrderBy('pro.propietario_id','desc')
            ->get();

    }

}