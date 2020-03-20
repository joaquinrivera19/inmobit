<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estado';

    protected $primaryKey = 'est_id';

    public $timestamps = false;
    public $fillable = ['est_id','est_nombre','ambito_id'];

    public function ambito()
    {
        return $this->belongsTo('App\Entities\Ambito', 'ambito_id', 'ambito_id');
    }
}
