<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 24/8/17
 * Time: 19:40
 */

namespace App\Entities;


use Illuminate\Database\Eloquent\Model;

class PropietarioLocalComercial extends Model
{

    protected $table = 'propietario_local_comercial';

    protected $primaryKey = 'propcomer_id';

    public $timestamps = false;
    public $fillable = ['propcomer_id','propcomer_cuit','per_id'];


    public function persona()
    {
        return $this->belongsTo('App\Entities\Persona', 'per_id', 'per_id');
    }

}