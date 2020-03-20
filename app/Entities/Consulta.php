<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Consulta extends Model
{
    protected $table = 'consulta';

    protected $primaryKey = 'cons_id';

    public $timestamps = false;
    public $fillable = ['cons_id', 'cons_mensaje', 'prop_id', 'est_id', 'per_id', 'cons_fechacarga', 'cont_id', 'comer_id'];

    public function propiedad()
    {
        return $this->belongsTo('App\Entities\Propiedad', 'prop_id', 'prop_id');
    }

    public function persona()
    {
        return $this->belongsTo('App\Entities\Persona', 'per_id', 'per_id');
    }

    public function estado()
    {
        return $this->belongsTo('App\Entities\Estado', 'est_id', 'est_id');
    }

    public function formacontacto()
    {
        return $this->belongsTo('App\Entities\FormaContacto', 'cont_id', 'cont_id');
    }

    public function localcomercial()
    {
        return $this->belongsTo('App\Entities\LocalComercial', 'comer_id', 'comer_id');
    }


    public static function getConsultaFiltro($fecha_desde, $fecha_hasta, $buscador, $select_ordenar)
    {

        return Consulta::ConsId($select_ordenar)
            ->FechaDesde($fecha_desde)
            ->FechaHasta($fecha_hasta)
            ->Buscador($buscador)
            //->orderBy('consulta.cons_id', 'desc')
            ->get();

    }

    public function scopeConsId($query, $select_ordenar)
    {

        $idlocal_comercial = Utilities::getLocalComercialId();

        if ($select_ordenar == 1) {
            $order = 'desc';
        } else {
            $order = 'asc';
        }

        $query->select(DB::raw('DATE_FORMAT(cons_fechacarga, "%d/%m/%Y") as fecha_carga'), DB::raw('DATE_FORMAT(cons_fechacarga, "%h:%m") as hora_carga')
            , 'persona.per_dni as dni', 'persona.per_apellido as apellido', 'persona.per_nombre as nombre',
            'persona.per_tel_fijo as tel_fijo', 'persona.per_tel_cel as tel_cel',
            'persona.per_email as email', 'consulta.cons_mensaje as mensaje', 'persona.per_domicilio as domicilio',
            'consulta.cons_id as idconsulta', 'persona.per_id as id', 'consulta.cont_id as cont_id')
            ->Join('persona', 'persona.per_id', '=', 'consulta.per_id')
            ->Join('local_comercial', 'local_comercial.comer_id', '=', 'consulta.comer_id')
            ->where('consulta.est_id', '=', '6')
            ->where('local_comercial.comer_id', '=', $idlocal_comercial)
            ->orderBy('consulta.cons_fechacarga', $order);

        return $query;
    }

    public function scopeFechaDesde($query, $fecha_desde)
    {

        if ($fecha_desde != "") {
            return $query->whereDate('consulta.cons_fechacarga', '>=', $fecha_desde);

        }

    }

    public function scopeFechaHasta($query, $fecha_hasta)
    {

        if ($fecha_hasta != "") {
            return $query->whereDate('consulta.cons_fechacarga', '<=', $fecha_hasta);
        }

    }

    public function scopeBuscador($query, $buscador)
    {

        if ($buscador != "") {

            $text = trim($buscador);

            return $query
                ->Where('consulta.cons_mensaje', "LIKE", "%$text%")
                ->orWhere('persona.per_apellido', "LIKE", "%$text%")
                ->orWhere('persona.per_nombre', "LIKE", "%$text%")
                ->orWhere('persona.per_dni', "LIKE", "%$text%")
                ->orWhere('persona.per_email', "LIKE", "%$text%")
                ->orWhere('persona.per_domicilio', "LIKE", "%$text%")
                ->orWhere('persona.per_tel_fijo', "LIKE", "%$text%")
                ->orWhere('persona.per_tel_cel', "LIKE", "%$text%");
        }

    }


}
