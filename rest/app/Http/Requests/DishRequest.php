<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DishRequest extends FormRequest
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
    public function rules() {
        return [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'price' => 'required'
        ];
    }

    public function messages() {
        return [
            'title.required' => 'Prašau įvesti patiekalo pavadinimą',
            'description.required' => 'Prašau įvesti patiekalo aprašymą',
            'image.required' => 'Prašau įvesti patiekalo nuotraukos URL',
            'price.required' => 'Prašau įvesti patiekalo kainą'
        ];
    }
}
