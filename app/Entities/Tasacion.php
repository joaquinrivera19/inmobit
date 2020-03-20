<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Tasacion extends Model
{
    protected $table = 'tasacion';

    protected $primaryKey = 'tas_id';

    public $timestamps = false;
    public $fillable = ['tas_id', 'tas_nombre', 'tas_fecha', 'tas_fechacarga', 'tas_descripcion',
        'tas_valor_venta', 'tas_valor_alq', 'tas_valor_alq_temp', 'tas_valor_tasacion', 'prop_id', 'est_id',
        'mon_id', 'comer_id','tas_exp'];

    public function propiedad()
    {
        return $this->belongsTo('App\Entities\Propiedad', 'prop_id', 'prop_id');
    }

    public function estado()
    {
        return $this->belongsTo('App\Entities\Estado', 'est_id', 'est_id');
    }

    public function moneda()
    {
        return $this->belongsTo('App\Entities\Moneda', 'mon_id', 'mon_id');
    }

    public function localcomercial()
    {
        return $this->belongsTo('App\Entities\LocalComercial', 'comer_id', 'comer_id');
    }

    public static function getTasacionFiltro($fecha_desde, $fecha_hasta, $buscador, $select_ordenar)
    {

        return Tasacion::TasId($select_ordenar)
            ->FechaDesde($fecha_desde)
            ->FechaHasta($fecha_hasta)
            ->Buscador($buscador)
            //->orderBy('tasacion.tas_id','desc')
            ->get();

    }

    public function scopeTasId($query, $select_ordenar)
    {

        $idlocal_comercial = Utilities::getLocalComercialId();

        if ($select_ordenar == 1) {
            $order = 'desc';
        } else {
            $order = 'asc';
        }

        $query->select(DB::raw('DATE_FORMAT(tas_fecha, "%d/%m/%Y") as fecha'), DB::raw('DATE_FORMAT(tas_fecha, "%h:%m") as hora')
            , 'persona.per_dni as dni', 'persona.per_apellido as apellido', 'persona.per_nombre as nombre',
            'persona.per_tel_fijo as tel_fijo', 'persona.per_tel_cel as tel_cel', 'persona.per_domicilio as per_domicilio',
            'persona.per_email as email', 'propiedad.prop_direccion as direccion_propiedad', 'tipo_operacion.tipopera_nombre as tipo_operacion',
            'tipo_inmueble.tipoinmu_nombre as tipoinmu', 'tipo_inmueble.tipoinmu_id as tipoinmu_id',
            'tasacion.tas_valor_tasacion as valor_tasacion', 'tasacion.tas_id as tas_id', 'tasacion.mon_id as mon_id',
            'persona.per_id as idpersona', 'tasacion.tas_descripcion as tas_descripcion', 'tasacion.tas_valor_venta as tas_valor_venta',
            'tasacion.tas_valor_alq as tas_valor_alq', 'tasacion.tas_valor_alq_temp as tas_valor_alq_temp',
            'propiedad.hab_id as hab_id', 'propiedad.numamb_id as numamb_id', 'propiedad.ban_id as ban_id',
            'propiedad.prop_dim_construido as prop_dim_construido', 'propiedad.prop_dim_total as prop_dim_total',
            'propietario.propietario_id as propietario_id', 'propiedad.prop_id as prop_id')
            ->Join('propiedad', 'propiedad.prop_id', '=', 'tasacion.prop_id')
            ->Join('propietario', 'propietario.propietario_id', '=', 'propiedad.propietario_id')
            ->Join('persona', 'propietario.per_id', '=', 'persona.per_id')
            ->Join('tipo_operacion', 'tipo_operacion.tipopera_id', '=', 'propiedad.tipopera_id')
            ->Join('tipo_inmueble', 'tipo_inmueble.tipoinmu_id', '=', 'propiedad.tipoinmu_id')
            ->Join('num_habitacion', 'num_habitacion.hab_id', '=', 'propiedad.hab_id')
            ->Join('num_ambiente', 'num_ambiente.numamb_id', '=', 'propiedad.numamb_id')
            ->Join('num_banio', 'num_banio.ban_id', '=', 'propiedad.ban_id')
            ->Join('local_comercial', 'local_comercial.comer_id', '=', 'tasacion.comer_id')
            ->where('tasacion.est_id', '=', '10')
            ->where('local_comercial.comer_id', '=', $idlocal_comercial)
            ->orderBy('tasacion.tas_fecha', $order);

        return $query;
    }

    public function scopeFechaDesde($query, $fecha_desde)
    {

        if ($fecha_desde != "") {
            return $query->whereDate('tasacion.tas_fecha', '>=', $fecha_desde);

        }

    }

    public function scopeFechaHasta($query, $fecha_hasta)
    {

        if ($fecha_hasta != "") {
            return $query->whereDate('tasacion.tas_fecha', '<=', $fecha_hasta);
        }

    }

    public function scopeBuscador($query, $buscador)
    {

        if ($buscador != "") {

            $text = trim($buscador);

            return $query
                ->Where('propiedad.prop_direccion', "LIKE", "%$text%")
                ->orWhere('persona.per_apellido', "LIKE", "%$text%")
                ->orWhere('persona.per_nombre', "LIKE", "%$text%")
                ->orWhere('persona.per_dni', "LIKE", "%$text%")
                ->orWhere('persona.per_email', "LIKE", "%$text%")
                ->orWhere('persona.per_domicilio', "LIKE", "%$text%")
                ->orWhere('persona.per_tel_fijo', "LIKE", "%$text%")
                ->orWhere('persona.per_tel_cel', "LIKE", "%$text%")
                ->orWhere('tipo_operacion.tipopera_nombre', "LIKE", "%$text%")
                ->orWhere('tipo_inmueble.tipoinmu_nombre', "LIKE", "%$text%");

        }

    }

}
