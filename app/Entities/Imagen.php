<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagen';

    protected $primaryKey = 'img_id';

    public $timestamps = false;
    public $fillable = ['img_id','img_url','prop_id','img_formato','img_path','img_size'];

    public function propiedad()
    {
        return $this->belongsTo('App\Entities\Propiedad', 'prop_id', 'prop_id');
    }
}
