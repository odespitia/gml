<?php

namespace App\Http\Requests;

use App\Rules\Country;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'documento' => 'required|unique:App\Models\User,document|min:6|max:10',
            'nombres' => 'required|between:5,100|alpha',
            'apellidos' => 'required|max:100|alpha',
            'email' => 'required|unique:App\Models\User,email|max:150|email:rfc,dns',
            'contraseña' => 'required_if:categoria,3',
            'direccion' => 'max:180',
            'movil' => 'required|digits:10',
            'categoria' => 'required',
            'pais' => [new Country]
            //
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'contraseña.required_if'  => 'El campo contraseña es obligatorio para un funcionario interno',
        ];
    }
}
