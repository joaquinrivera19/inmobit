<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Instalacion extends Model
{
    protected $table = 'instalacion';

    protected $primaryKey = 'inst_id';

    public $timestamps = false;
    public $fillable = ['inst_id','inst_nombre'];

    public function propiedadxinstalacion()
    {
        return $this->hasMany('App\Entities\PropiedadXInstalacion','inst_id');
    }
}
