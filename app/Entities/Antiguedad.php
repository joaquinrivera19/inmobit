<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Antiguedad extends Model
{
    protected $table = 'antiguedad';

    protected $primaryKey = 'antig_id';

    public $timestamps = false;
    public $fillable = ['antig_id','antig_nombre'];

    public static $rules = [
        //
    ];
}
