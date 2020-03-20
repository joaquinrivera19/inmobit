<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Propietario extends Model
{
    protected $table = 'propietario';

    protected $primaryKey = 'propietario_id';

    public $timestamps = false;
    public $fillable = ['propietario_id','propietario_nombre','per_id','propietario_fechacarga','comer_id'];

    public function persona()
    {
        return $this->belongsTo('App\Entities\Persona', 'per_id', 'per_id');
    }

    public function localcomercial()
    {
        return $this->belongsTo('App\Entities\LocalComercial', 'comer_id', 'comer_id');
    }

    public static function getPropietarioFiltro($buscador)
    {

        return Propietario::PropietarioId()
            ->Buscador($buscador)
            ->OrderBy('propietario.propietario_id','desc')
            ->get();

    }

    public function scopePropietarioId($query)
    {

        $idlocal_comercial = Utilities::getLocalComercialId();

        $query->select(DB::raw("(select COUNT(propi.prop_id) from propiedad as propi
                    where propi.propietario_id=propietario.propietario_id
                    GROUP BY propietario.propietario_id) as num_propiedades"),
                'persona.per_dni as dni','persona.per_apellido as apellido','persona.per_nombre as nombre',
                'persona.per_tel_fijo as tel_fijo','persona.per_tel_cel as tel_cel',
                'persona.per_email as email', 'persona.per_domicilio as domicilio','persona.per_id as id',
                'propietario.propietario_id as propietario_id')
            ->Join('persona','persona.per_id','=','propietario.per_id')
            ->Join('local_comercial','local_comercial.comer_id','=','propietario.comer_id')
            ->where('persona.est_id','=','8')
            ->where('local_comercial.comer_id','=',$idlocal_comercial)
            ->where('persona.per_tasacion','=',0);

        return $query;

    }

    public function scopeBuscador($query, $buscador)
    {

        if ($buscador != "") {

            $text = trim($buscador);

            return $query
                ->Where('persona.per_apellido', "LIKE", "%$text%")
                ->orWhere('persona.per_nombre', "LIKE", "%$text%")
                ->orWhere('persona.per_dni', "LIKE", "%$text%")
                ->orWhere('persona.per_email', "LIKE", "%$text%")
                ->orWhere('persona.per_domicilio', "LIKE", "%$text%")
                ->orWhere('persona.per_tel_fijo', "LIKE", "%$text%")
                ->orWhere('persona.per_tel_cel', "LIKE", "%$text%");

        }

    }
}
