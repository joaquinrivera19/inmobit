<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Moneda extends Model
{
    protected $table = 'moneda';

    protected $primaryKey = 'mon_id';

    public $timestamps = false;
    public $fillable = ['mon_id','mon_nombre'];

    public static $rules = [
        //
    ];
}
