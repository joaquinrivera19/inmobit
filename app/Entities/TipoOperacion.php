<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class TipoOperacion extends Model
{
    protected $table = 'tipo_operacion';

    protected $primaryKey = 'tipopera_id';

    public $timestamps = false;
    public $fillable = ['tipopera_id','tipopera_nombre'];

    public static $rules = [
        //
    ];
}
