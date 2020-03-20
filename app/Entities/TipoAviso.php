<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class TipoAviso extends Model
{
    protected $table = 'tipo_aviso';

    protected $primaryKey = 'aviso_id';

    public $timestamps = false;
    public $fillable = ['aviso_id','aviso_nombre'];

    public static $rules = [
        //
    ];
}
