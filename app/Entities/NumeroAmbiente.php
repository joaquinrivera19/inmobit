<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class NumeroAmbiente extends Model
{
    protected $table = 'num_ambiente';

    protected $primaryKey = 'numamb_id';

    public $timestamps = false;
    public $fillable = ['numamb_id','numamb_nombre'];

    public static $rules = [
        //
    ];
}
