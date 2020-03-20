<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    protected $table = 'localidad';

    protected $primaryKey = 'loc_id';

    public $timestamps = false;
    public $fillable = ['loc_id','loc_nombre','prov_id'];

    public function provincia()
    {
        return $this->belongsTo('App\Entities\Provincia', 'prov_id', 'prov_id');
    }
}
