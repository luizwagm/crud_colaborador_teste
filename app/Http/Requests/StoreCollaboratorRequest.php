<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCollaboratorRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'full_name' => [
                'required',
                'string',
            ],
            'cpf' => [
                'required',
                'integer',
                Rule::unique('collaborators', 'cpf')
            ],
            'email' => [
                'required',
                'string',
                Rule::unique('collaborators', 'email')
            ],
            'rg' => [
                'required',
                'integer',
            ],
            'birthdate' => [
                'required',
                'date',
            ],
            'cep' => [
                'required',
                'string',
            ],
            'address' => [
                'required',
                'string',
            ],
            'number' => [
                'required',
                'string',
            ],
            'city' => [
                'required',
                'string',
            ],
            'state' => [
                'required',
                'string',
            ],
            'salary' => [
                'required',
                'string',
            ],
        ];
    }
}
