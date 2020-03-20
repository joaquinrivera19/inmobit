<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class NumeroBanio extends Model
{
    protected $table = 'num_banio';

    protected $primaryKey = 'ban_id';

    public $timestamps = false;
    public $fillable = ['ban_id','ban_nombre'];

    public static $rules = [
        //
    ];
}
