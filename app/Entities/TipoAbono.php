<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class TipoAbono extends Model
{
    protected $table = 'tipo_abono';

    protected $primaryKey = 'abono_id';

    public $timestamps = false;
    public $fillable = ['abono_id','abono_nombre','abono_precio','abono_descuento'];

    public static $rules = [
        //
    ];
}
