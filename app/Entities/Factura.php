<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = 'factura';

    protected $primaryKey = 'fac_id';

    public $timestamps = false;
    public $fillable = ['fac_id','fac_codigo','fac_fechaemision','fac_fechapago','fac_fechavenc','fac_total','fac_impuesto',
        'fac_numpago','fac_periodo_desde','fac_periodo_hasta','per_id','forpago_id','est_id'];

    public function persona()
    {
        return $this->belongsTo('App\Entities\Persona', 'per_id', 'per_id');
    }

    public function formapago()
    {
        return $this->belongsTo('App\Entities\FormaPago', 'forpago_id', 'forpago_id');
    }

    public function estado()
    {
        return $this->belongsTo('App\Entities\Estado', 'est_id', 'est_id');
    }


}
