<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class PreguntaFrecuente extends Model
{
    protected $table = 'pregunta_frecuente';

    protected $primaryKey = 'preg_id';

    public $timestamps = false;
    public $fillable = ['preg_id','preg_nombre','preg_fecha','usuario_id','est_id','preg_fechacarga'];

    public function estado()
    {
        return $this->belongsTo('App\Entities\Estado', 'est_id', 'est_id');
    }
}
