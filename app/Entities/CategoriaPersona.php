<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class CategoriaPersona extends Model
{
    protected $table = 'categoria_persona';

    protected $primaryKey = 'catper_id';

    public $timestamps = false;
    public $fillable = ['catper_id','catper_nombre'];

    public static $rules = [
        //
    ];
}
