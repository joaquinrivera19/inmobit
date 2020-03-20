<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class PropiedadXAmbiente extends Model
{
    protected $table = 'propxamb';

    protected $primaryKey = 'pxa_id';

    public $timestamps = false;
    public $fillable = ['pxa_id','amb_id','prop_id','pxa_habilitado'];

    public function propiedad()
    {
        return $this->belongsTo('App\Entities\Propiedad', 'prop_id', 'prop_id');
    }

    public function ambiente()
    {
        return $this->belongsTo('App\Entities\Ambiente', 'amb_id', 'amb_id');
    }
}
