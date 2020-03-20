<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'video';

    protected $primaryKey = 'video_id';

    public $timestamps = false;
    public $fillable = ['video_id','video_nombre','prop_id'];

    public function propiedad()
    {
        return $this->belongsTo('App\Entities\Propiedad', 'prop_id', 'prop_id');
    }
}
