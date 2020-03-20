<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class LocalComercial extends Model
{
    protected $table = 'local_comercial';

    protected $primaryKey = 'comer_id';

    public $timestamps = false;
    public $fillable = ['comer_id','comer_nombre','comer_direccion','comer_piso','comer_depto','comer_tel_fijo',
        'comer_tel_cel','loc_id','comer_codpostal','comer_web','comer_email','comer_poseo_web','comer_imagen',
        'propcomer_id','comer_fechacarga','est_id','user_id'];

    public function propietariolocalcomercial()
    {
        return $this->belongsTo('App\Entities\PropietarioLocalComercial', 'propcomer_id', 'propcomer_id');
    }

    public function localidad()
    {
        return $this->belongsTo('App\Entities\Localidad', 'loc_id', 'loc_id');
    }

    public function estado()
    {
        return $this->belongsTo('App\Entities\Estado', 'est_id', 'est_id');
    }

    public function publicacion()
    {
        return $this->hasMany('App\Entities\Publicacion','comer_id');
    }

    public function consulta()
    {
        return $this->hasMany('App\Entities\Consulta','comer_id');
    }

    public function tasacion()
    {
        return $this->hasMany('App\Entities\Tasacion','comer_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Entities\User', 'user_id', 'id');
    }

    public function propietario()
    {
        return $this->hasMany('App\Entities\Propietario','comer_id');
    }


    public static function getLocalComercialFiltro($buscador)
    {

        return LocalComercial::LocalComercialId()
            ->Buscador($buscador)
            ->OrderBy('local_comercial.comer_id','desc')
            ->get();

    }

    public function scopeLocalComercialId($query)
    {

        $query->select('persona.per_dni as dni','persona.per_apellido as apellido','persona.per_nombre as nombre',
                'persona.per_tel_fijo as tel_fijo','persona.per_tel_cel as tel_cel',
                'persona.per_email as email', 'persona.per_domicilio as domicilio','persona.per_id as id',
                'local_comercial.comer_imagen as img','local_comercial.comer_id as comer_id',
                'local_comercial.comer_nombre as comer_nombre','local_comercial.comer_direccion as comer_direccion',
                'local_comercial.propcomer_id as propcomer_id')
            ->leftJoin('propietario_local_comercial','propietario_local_comercial.propcomer_id','=','local_comercial.propcomer_id')
            ->leftJoin('persona','persona.per_id','=','propietario_local_comercial.per_id')
            ->leftJoin('users','users.id','=','local_comercial.user_id')
            ->where('local_comercial.est_id','=','14')
            ->where('users.tipu_id','=','2');

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
