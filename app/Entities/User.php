<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'email', 'password','per_id','tipu_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function persona()
    {
        return $this->belongsTo('App\Entities\Persona', 'per_id', 'per_id');
    }

    public function tipousuario()
    {
        return $this->belongsTo('App\Entities\TipoUsuario', 'tipu_id', 'tipu_id');
    }

    public function localcomercial()
    {
        return $this->belongsTo('App\Entities\LocalComercial', 'id', 'user_id');
    }
}
