<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table = 'provincia';

    protected $primaryKey = 'prov_id';

    public $timestamps = false;
    public $fillable = ['prov_id','prov_nombre'];

    public static $rules = [
        //
    ];
}
