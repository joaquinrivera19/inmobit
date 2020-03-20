<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Ambiente extends Model
{
    protected $table = 'ambiente';

    protected $primaryKey = 'amb_id';

    public $timestamps = false;
    public $fillable = ['amb_id','amb_nombre'];

    public function propiedadxambiente()
    {
        return $this->hasMany('App\Entities\PropiedadXAmbiente','amb_id');
    }
}
