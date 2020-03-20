<?php

namespace App\Http\Requests;

use App\Entities\Persona;
use Illuminate\Foundation\Http\FormRequest;

class CreatePersonaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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

        return [
            'per_apellido' => 'required|min:3|max:100',
            'per_nombre' => 'required|min:3|max:100',
            'per_email' => 'required|string|email|max:255|unique:persona',
            'password' => 'required|string|min:6',
        ];

    }
}
