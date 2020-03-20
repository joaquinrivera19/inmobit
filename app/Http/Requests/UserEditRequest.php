<?php

/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 3/10/17
 * Time: 18:28
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $idtipo = $this->idtipo;

        if ($idtipo == 2) {

            return [
                'password' => 'Required|Min:6|Confirmed|Regex:/^([a-z0-9!@#$€£%^&*_+-])+$/i',
                'password_confirmation' => 'Required|Min:6'
            ];

        } else {

            return [];

        }



    }

}