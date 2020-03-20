<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'persona';

    protected $primaryKey = 'per_id';

    public $timestamps = false;
    public $fillable = ['per_id','per_apellido','per_nombre','per_dni','per_email','per_tel_fijo','per_tel_cel',
        'per_domicilio','loc_id','est_id','catper_id','per_fechacarga'];


    public function localidad()
    {
        return $this->belongsTo('App\Entities\Localidad', 'loc_id', 'loc_id');
    }

    public function categoriapersona()
    {
        return $this->belongsTo('App\Entities\CategoriaPersona', 'catper_id', 'catper_id');
    }

    public function estado()
    {
        return $this->belongsTo('App\Entities\Estado', 'est_id', 'est_id');
    }

    public function propietariolocalcomercial()
    {
        return $this->belongsTo('App\Entities\PropietarioLocalComercial', 'per_id', 'per_id');
    }

}
