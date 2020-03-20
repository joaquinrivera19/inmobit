<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 24/8/17
 * Time: 16:45
 */

namespace App\Repositories;

use App\Entities\LocalComercial;
use Illuminate\Support\Facades\DB;


class LocalComercialRepository
{

    public function getLocalComercialId($idlocal_comercial)
    {

        return DB::table('local_comercial')
            /*->select('persona.per_dni as dni','persona.per_apellido as apellido','persona.per_nombre as nombre',
                'persona.per_tel_fijo as tel_fijo','persona.per_tel_cel as tel_cel',
                'persona.per_email as email', 'persona.per_domicilio as domicilio','persona.per_id as id')*/
            ->Join('propietario_local_comercial','propietario_local_comercial.propcomer_id','=','local_comercial.propcomer_id')
            ->Join('persona','persona.per_id','=','propietario_local_comercial.per_id')
            ->Join('users','users.id','=','local_comercial.user_id')
            ->where('local_comercial.comer_id','=',$idlocal_comercial)
            ->first();
    }

    public function getLocalComercialAll()
    {
        return DB::table('local_comercial')
            ->select('persona.per_dni as dni','persona.per_apellido as apellido','persona.per_nombre as nombre',
                'persona.per_tel_fijo as tel_fijo','persona.per_tel_cel as tel_cel',
                'persona.per_email as email', 'persona.per_domicilio as domicilio','persona.per_id as id',
                'local_comercial.comer_imagen as img','local_comercial.comer_id as comer_id',
                'local_comercial.comer_nombre as comer_nombre','local_comercial.comer_direccion as comer_direccion',
                'local_comercial.propcomer_id as propcomer_id')
            ->leftJoin('propietario_local_comercial','propietario_local_comercial.propcomer_id','=','local_comercial.propcomer_id')
            ->leftJoin('persona','persona.per_id','=','propietario_local_comercial.per_id')
            ->leftJoin('users','users.id','=','local_comercial.user_id')
            ->where('local_comercial.est_id','=','14')
            ->where('users.tipu_id','=','2')
            ->get();
    }

    public function getLocalAdmin($iduser)
        {
        return DB::table('persona')
            ->leftJoin('users','users.per_id','=','persona.per_id')
            ->where('users.id','=',$iduser)
            ->first();
    }


}