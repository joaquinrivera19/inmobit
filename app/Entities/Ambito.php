<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Ambito extends Model
{
    protected $table = 'ambito';

    protected $primaryKey = 'ambito_id';

    public $timestamps = false;
    public $fillable = ['ambito_id','ambito_nombre'];

    public static $rules = [
        //
    ];

}
