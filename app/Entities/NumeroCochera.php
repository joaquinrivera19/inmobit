<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class NumeroCochera extends Model
{
    protected $table = 'num_cochera';

    protected $primaryKey = 'cochera_id';

    public $timestamps = false;
    public $fillable = ['cochera_id','cochera_nombre'];

    public static $rules = [
        //
    ];
}
