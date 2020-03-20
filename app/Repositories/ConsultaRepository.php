<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 24/8/17
 * Time: 16:40
 */

namespace App\Repositories;

use App\Entities\Consulta;
use Illuminate\Support\Facades\DB;

class ConsultaRepository
{
    public function getConsultaAll($idlocal_comercial)
    {

        return DB::table('consulta')
            ->select(DB::raw('DATE_FORMAT(cons_fechacarga, "%d/%m/%Y") as fecha_carga'),DB::raw('DATE_FORMAT(cons_fechacarga, "%h:%m") as hora_carga')
                ,'persona.per_dni as dni','persona.per_apellido as apellido','persona.per_nombre as nombre',
                'persona.per_tel_fijo as tel_fijo','persona.per_tel_cel as tel_cel',
                'persona.per_email as email', 'consulta.cons_mensaje as mensaje','persona.per_domicilio as domicilio',
                'consulta.cons_id as idconsulta','persona.per_id as id', 'consulta.cont_id as cont_id')
            ->Join('persona','persona.per_id','=','consulta.per_id')
            ->Join('local_comercial','local_comercial.comer_id','=','consulta.comer_id')
            ->where('consulta.est_id','=','6')
            ->where('local_comercial.comer_id','=',$idlocal_comercial)
            ->orderBy('consulta.cons_id','desc')
            ->paginate(15);
    }

    public function getConsultaWeb($idlocal_comercial,$idpropiedad)
    {

        return DB::table('consulta')
            ->select(DB::raw('DATE_FORMAT(cons_fechacarga, "%d/%m/%Y") as fecha_carga'),DB::raw('DATE_FORMAT(cons_fechacarga, "%h:%m") as hora_carga')
                ,'persona.per_dni as dni','persona.per_apellido as apellido','persona.per_nombre as nombre',
                'persona.per_tel_fijo as tel_fijo','persona.per_tel_cel as tel_cel',
                'persona.per_email as email', 'consulta.cons_mensaje as mensaje','persona.per_domicilio as domicilio',
                'consulta.cons_id as idconsulta','persona.per_id as id','consulta.cont_id as cont_id')
            ->Join('persona','persona.per_id','=','consulta.per_id')
            ->Join('local_comercial','local_comercial.comer_id','=','consulta.comer_id')
            ->where('consulta.est_id','=','6')
            ->where('local_comercial.comer_id','=',$idlocal_comercial)
            ->where('consulta.prop_id','=',$idpropiedad)
            ->orderBy('consulta.cons_id','desc')
            ->paginate(15);
    }

    public function getConsultaId($idconsulta)
    {
        return DB::table('consulta')
            ->Join('persona','persona.per_id','=','consulta.per_id')
            ->where('consulta.cons_id','=',$idconsulta)
            ->first();
    }

}