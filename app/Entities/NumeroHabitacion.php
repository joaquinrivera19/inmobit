<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class NumeroHabitacion extends Model
{
    protected $table = 'num_habitacion';

    protected $primaryKey = 'hab_id';

    public $timestamps = false;
    public $fillable = ['hab_id','hab_nombre'];

    public static $rules = [
        //
    ];
}
