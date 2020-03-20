<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicio';

    protected $primaryKey = 'serv_id';

    public $timestamps = false;
    public $fillable = ['serv_id','serv_nombre'];

    public function propiedadxservicio()
    {
        return $this->hasMany('App\Entities\PropiedadXServicio','serv_id');
    }
}
