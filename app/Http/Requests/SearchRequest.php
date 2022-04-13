<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            'source' => ['sometimes', 'required', Rule::exists('direct_distance_dialings', 'id')],
            'destination' => ['sometimes', 'required', 'different:source', Rule::exists('direct_distance_dialings', 'id')],	
            'time' => ['sometimes', 'required', 'integer', 'min:1'],
            'plan' => ['sometimes', 'required', Rule::exists('plans', 'id')],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'source' => 'Origem',
            'destination' => 'Destino',
            'time' => 'Minutos',
            'plan' => 'Plano',
        ];
    }
}
