<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class PropiedadXServicio extends Model
{
    protected $table = 'propxserv';

    protected $primaryKey = 'pxs_id';

    public $timestamps = false;
    public $fillable = ['pxs_id','serv_id','prop_id','pxs_habilitado'];

    public function propiedad()
    {
        return $this->belongsTo('App\Entities\Propiedad', 'prop_id', 'prop_id');
    }

    public function servicio()
    {
        return $this->belongsTo('App\Entities\Servicio', 'serv_id', 'serv_id');
    }
}
