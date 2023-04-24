<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BreweryRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'score' => 'required|numeric|min:1|max:5'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Es necesario que indiques el nombre de la cervecería',
            'description' => [
                'required' => 'Es necesario que indiques una descripción de la cervecería'
        ],
            
            'score.required' => 'Es necesario que indiques la puntuación de la cervecería',
            'max' => 'Es neceario introducir una puntuación entre 1 y 5',
            'min' => 'Es neceario introducir una puntuación entre 1 y 5'
        ];
    }
}
