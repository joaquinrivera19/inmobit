<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 25/8/17
 * Time: 18:43
 */

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class FormaPago extends Model
{

    protected $table = 'forma_pago';

    protected $primaryKey = 'forpago_id';

    public $timestamps = false;
    public $fillable = ['forpago_id','forpago_nombre'];

}