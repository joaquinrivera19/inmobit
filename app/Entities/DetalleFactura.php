<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class DetalleFactura extends Model
{
    protected $table = 'detalle_factura';

    protected $primaryKey = 'detfac_id';

    public $timestamps = false;
    public $fillable = ['detfac_id','detfac_subtotal','detfac_nombre','detfac_cantidad','detfac_iva','detfac_descuento',
        'pub_id','fac_id'];

    public function publicacion()
    {
        return $this->belongsTo('App\Entities\Publicacion', 'pub_id', 'pub_id');
    }

    public function factura()
    {
        return $this->belongsTo('App\Entities\Factura', 'fac_id', 'fac_id');
    }
}
