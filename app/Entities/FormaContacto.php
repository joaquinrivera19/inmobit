<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class FormaContacto extends Model
{
    protected $table = 'forma_contacto';

    protected $primaryKey = 'cont_id';

    public $timestamps = false;
    public $fillable = ['cont_id','cont_nombre'];

    public static $rules = [
        //
    ];
}
