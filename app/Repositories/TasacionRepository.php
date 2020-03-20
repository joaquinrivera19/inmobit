<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 24/8/17
 * Time: 17:02
 */

namespace App\Repositories;

use App\Entities\Tasacion;
use Illuminate\Support\Facades\DB;

class TasacionRepository
{
    public function getTasacionAll($idlocal_comercial)
    {

        return DB::table('tasacion')
            ->select(DB::raw('DATE_FORMAT(tas_fecha, "%d/%m/%Y") as fecha'),DB::raw('DATE_FORMAT(tas_fecha, "%h:%m") as hora')
                ,'persona.per_dni as dni','persona.per_apellido as apellido','persona.per_nombre as nombre',
                'persona.per_tel_fijo as tel_fijo','persona.per_tel_cel as tel_cel','persona.per_domicilio as per_domicilio',
                'persona.per_email as email', 'propiedad.prop_direccion as direccion_propiedad','tipo_operacion.tipopera_nombre as tipo_operacion',
                'tipo_inmueble.tipoinmu_nombre as tipoinmu','tipo_inmueble.tipoinmu_id as tipoinmu_id',
                'tasacion.tas_valor_tasacion as valor_tasacion','tasacion.tas_id as tas_id','tasacion.mon_id as mon_id',
                'persona.per_id as idpersona','tasacion.tas_descripcion as tas_descripcion','tasacion.tas_valor_venta as tas_valor_venta',
                'tasacion.tas_valor_alq as tas_valor_alq','tasacion.tas_valor_alq_temp as tas_valor_alq_temp',
                'propiedad.hab_id as hab_id','propiedad.numamb_id as numamb_id','propiedad.ban_id as ban_id',
                'propiedad.prop_dim_construido as prop_dim_construido','propiedad.prop_dim_total as prop_dim_total',
                'propietario.propietario_id as propietario_id', 'propiedad.prop_id as prop_id','tasacion.tas_exp as tas_exp')
            ->Join('propiedad','propiedad.prop_id','=','tasacion.prop_id')
            ->Join('propietario','propietario.propietario_id','=','propiedad.propietario_id')
            ->Join('persona','propietario.per_id','=','persona.per_id')
            ->Join('tipo_operacion','tipo_operacion.tipopera_id','=','propiedad.tipopera_id')
            ->Join('tipo_inmueble','tipo_inmueble.tipoinmu_id','=','propiedad.tipoinmu_id')
            ->Join('num_habitacion','num_habitacion.hab_id','=','propiedad.hab_id')
            ->Join('num_ambiente','num_ambiente.numamb_id','=','propiedad.numamb_id')
            ->Join('num_banio','num_banio.ban_id','=','propiedad.ban_id')
            ->Join('local_comercial','local_comercial.comer_id','=','tasacion.comer_id')
            ->where('tasacion.est_id','=','10')
            ->where('local_comercial.comer_id','=',$idlocal_comercial)
            ->orderBy('tasacion.tas_id','desc')
            ->get();

    }

    public function getTasacionId($idtasacion)
    {

        return DB::table('tasacion')
            ->Join('propiedad','propiedad.prop_id','=','tasacion.prop_id')
            ->Join('propietario','propietario.propietario_id','=','propiedad.propietario_id')
            ->Join('persona','propietario.per_id','=','persona.per_id')
            ->Join('tipo_operacion','tipo_operacion.tipopera_id','=','propiedad.tipopera_id')
            ->Join('tipo_inmueble','tipo_inmueble.tipoinmu_id','=','propiedad.tipoinmu_id')
            ->Join('num_habitacion','num_habitacion.hab_id','=','propiedad.hab_id')
            ->Join('num_ambiente','num_ambiente.numamb_id','=','propiedad.numamb_id')
            ->Join('num_banio','num_banio.ban_id','=','propiedad.ban_id')
            ->Join('local_comercial','local_comercial.comer_id','=','tasacion.comer_id')
            ->where('tasacion.tas_id','=',$idtasacion)
            ->first();

    }

}