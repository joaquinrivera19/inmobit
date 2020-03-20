<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    protected $table = 'tipo_usuario';

    protected $primaryKey = 'tipu_id';

    public $timestamps = false;
    public $fillable = ['tipu_id','tipu_nombre'];

    public static $rules = [
        //
    ];
}
