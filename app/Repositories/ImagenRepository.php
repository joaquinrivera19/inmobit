<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 24/8/17
 * Time: 16:43
 */

namespace App\Repositories;


use App\Entities\Imagen;

class ImagenRepository
{
    public function getImagenAll()
    {
        return Imagen::all();
    }

}