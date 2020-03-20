<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class TipoInmueble extends Model
{
    protected $table = 'tipo_inmueble';

    protected $primaryKey = 'tipoinmu_id';

    public $timestamps = false;
    public $fillable = ['tipoinmu_id','tipoinmu_nombre'];

    public static $rules = [
        //
    ];
}
