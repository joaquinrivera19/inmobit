<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class PropiedadXInstalacion extends Model
{
    protected $table = 'propxinst';

    protected $primaryKey = 'pxi_id';

    public $timestamps = false;
    public $fillable = ['pxi_id','inst_id','prop_id','pxi_habilitado'];

    public function propiedad()
    {
        return $this->belongsTo('App\Entities\Propiedad', 'prop_id', 'prop_id');
    }

    public function instalacion()
    {
        return $this->belongsTo('App\Entities\Instalacion', 'inst_id', 'inst_id');
    }
}
