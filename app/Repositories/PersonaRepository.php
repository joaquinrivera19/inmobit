<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 24/8/17
 * Time: 16:55
 */

namespace App\Repositories;


use App\Entities\Persona;

class PersonaRepository
{
    public function getPersonaAll()
    {
        return Persona::all();
    }

}