<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Publicacion extends Model
{
    protected $table = 'publicacion';

    protected $primaryKey = 'pub_id';

    public $timestamps = false;
    public $fillable = ['pub_id','pub_fechacarga','pub_titulo','pub_descripcion','pub_fechavenc','prop_id','est_id','aviso_id',
        'abono_id','comer_id'];

    public function tipoabono()
    {
        return $this->belongsTo('App\Entities\TipoAbono', 'abono_id', 'abono_id');
    }

    public function tipoaviso()
    {
        return $this->belongsTo('App\Entities\TipoAviso', 'aviso_id', 'aviso_id');
    }

    public function estado()
    {
        return $this->belongsTo('App\Entities\Estado', 'est_id', 'est_id');
    }

    public function propiedad()
    {
        return $this->belongsTo('App\Entities\Propiedad', 'prop_id', 'prop_id');
    }

    public function localcomercial()
    {
        return $this->belongsTo('App\Entities\LocalComercial', 'comer_id', 'comer_id');
    }


    public static function getPublicacionFiltro($estado,$tipooperacion,$tipoinmu,$numhab,$buscador, $select_ordenar)
    {

        return Publicacion::PubId($select_ordenar)
            ->EstadoPublicacion($estado)
            ->TipoOperacion($tipooperacion)
            ->TipoInmueble($tipoinmu)
            ->NumHabitacion($numhab)
            ->Buscador($buscador)
            //->orderBy('publicacion.pub_id','desc')
            ->get();

    }

    public function scopePubId($query,$select_ordenar)
    {

        $idlocal_comercial = Utilities::getLocalComercialId();

        if ($select_ordenar == 0) {
            $order2 = 'desc';
            $order1 = 'publicacion.pub_fechacarga';
        } elseif ($select_ordenar == 1) {
            $order2 = 'desc';
            $order1 = 'propiedad.prop_valor';
        } else {
            $order2 = 'asc';
            $order1 = 'propiedad.prop_valor';
        }



        $query->select('propiedad.prop_direccion as prop_direccion', 'localidad.loc_nombre as loc_nombre','publicacion.pub_id as pub_id',
            'tipo_operacion.tipopera_nombre as tipopera_nombre','tipo_inmueble.tipoinmu_nombre as tipoinmu_nombre',
            'propiedad.prop_valor as prop_valor','propiedad.prop_comision as prop_comision',
            'estado.est_id as est_id','estado.est_nombre as est_nombre',
            'tipo_aviso.aviso_id as aviso_id','tipo_aviso.aviso_nombre as aviso_nombre','propiedad.prop_id as prop_id','users.id as user_id',
            DB::raw("(SELECT imagen.img_url as img_url
                 FROM imagen WHERE imagen.prop_id=propiedad.prop_id order by imagen.img_id desc LIMIT 1) as img"))
            ->Join('propiedad','propiedad.prop_id','=','publicacion.prop_id')
            ->Join('localidad','localidad.loc_id','=','propiedad.loc_id')
            ->Join('propietario','propietario.propietario_id','=','propiedad.propietario_id')
            ->Join('persona','propietario.per_id','=','persona.per_id')
            ->Join('tipo_operacion','tipo_operacion.tipopera_id','=','propiedad.tipopera_id')
            ->Join('tipo_inmueble','tipo_inmueble.tipoinmu_id','=','propiedad.tipoinmu_id')
            ->Join('estado','estado.est_id','=','publicacion.est_id')
            ->Join('tipo_aviso','tipo_aviso.aviso_id','=','publicacion.aviso_id')
            ->Join('local_comercial','local_comercial.comer_id','=','publicacion.comer_id')
            ->Join('users','users.id','=','local_comercial.user_id')
            // -- est_id 16 significa estado eliminado -- //
            ->where('publicacion.est_id','!=','16')
            ->where('local_comercial.comer_id','=',$idlocal_comercial)
            ->orderBy($order1,$order2);

        return $query;

    }

    public function scopeEstadoPublicacion($query, $estado)
    {

        if($estado != "")
        {
            return $query->where('publicacion.est_id','=', $estado);
        }

    }

    public function scopeTipoOperacion($query, $tipooperacion)
    {

        if($tipooperacion != "")
        {
            return $query->where('propiedad.tipopera_id','=', $tipooperacion);
        }

    }

    public function scopeTipoInmueble($query, $tipoinmu)
    {

        if($tipoinmu != "")
        {
            return $query->where('propiedad.tipoinmu_id','=', $tipoinmu);
        }

    }

    public function scopeNumHabitacion($query, $numhab)
    {

        if($numhab != "")
        {
            return $query->where('propiedad.hab_id','=', $numhab);
        }

    }

    public function scopeBuscador($query, $buscador)
    {

        if ($buscador != "") {

            $text = trim($buscador);

            return $query
                ->Where('propiedad.prop_direccion', "LIKE", "%$text%")
                ->orWhere('localidad.loc_nombre', "LIKE", "%$text%")
                ->orWhere('publicacion.pub_id', "LIKE", "%$text%");
        }

    }

}
