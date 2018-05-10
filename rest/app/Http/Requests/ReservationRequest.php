<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'numberOfPeople' => 'required',
            'phone' => 'required',
            'date' => 'required',
            'time' => 'required'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Prašau vardą',
            'surname.required' => 'Prašau įvesti pavardę',
            'email.required' => 'Prašau įvesti elektroninio pašto adresą',
            'numberOfPeople.required' => 'Prašau įvesti žmonių skaičių',
            'phone.required' => 'Prašau įvesti telefono numerį',
            'date.required' => 'Prašau įvesti datą',
            'time.required' => 'Prašau įvesti laiką'
        ];
    }
}
