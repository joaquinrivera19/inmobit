<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
    protected $table = 'propiedad';

    protected $primaryKey = 'prop_id';

    public $timestamps = false;
    public $fillable = ['prop_id','prop_dim_construido','prop_dim_total','prop_direccion','cochera_id',
        'tipoinmu_id','tipopera_id','numamb_id','hab_id','ban_id','loc_id','est_id','propietario_id','prop_comision',
        'antig_id','prop_ocupada','mon_id','prop_valor','prop_valor_oculto','prop_confidencial','prop_fechacarga'];

    public function numerocochera()
    {
        return $this->belongsTo('App\Entities\NumeroCochera', 'cochera_id', 'cochera_id');
    }

    public function numerobarrio()
    {
        return $this->belongsTo('App\Entities\NumeroBarrio', 'ban_id', 'ban_id');
    }

    public function numerohabitacion()
    {
        return $this->belongsTo('App\Entities\NumeroHabitacion', 'hab_id', 'hab_id');
    }

    public function numeroambiente()
    {
        return $this->belongsTo('App\Entities\NumeroAmbiente', 'numamb_id', 'numamb_id');
    }

    public function tipooperacion()
    {
        return $this->belongsTo('App\Entities\TipoOperacion', 'tipopera_id', 'tipopera_id');
    }

    public function tipoinmueble()
    {
        return $this->belongsTo('App\Entities\TipoInmueble', 'tipoinmu_id', 'tipoinmu_id');
    }

    public function moneda()
    {
        return $this->belongsTo('App\Entities\Moneda', 'mon_id', 'mon_id');
    }

    public function estado()
    {
        return $this->belongsTo('App\Entities\Estado', 'est_id', 'est_id');
    }

    public function localidad()
    {
        return $this->belongsTo('App\Entities\Localidad', 'loc_id', 'loc_id');
    }

    public function antiguedad()
    {
        return $this->belongsTo('App\Entities\Antiguedad', 'antig_id', 'antig_id');
    }

    public function propietario()
    {
        return $this->belongsTo('App\Entities\Propietario', 'propietario_id', 'propietario_id');
    }

    public function propiedadxambiente()
    {
        return $this->hasMany('App\Entities\PropiedadXAmbiente','prop_id');
    }

    public function propiedadxinstalacion()
    {
        return $this->hasMany('App\Entities\PropiedadXInstalacion','prop_id');
    }

    public function propiedadxservicio()
    {
        return $this->hasMany('App\Entities\PropiedadXServicio','prop_id');
    }

    public function publicacion()
    {
        return $this->hasMany('App\Entities\Publicacion','prop_id');
    }
}
