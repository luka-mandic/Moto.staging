<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use \App\Motor;


class StoreMotor extends FormRequest
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
            'broj_sasije' => 'required|unique:motors,broj_sasije,'.$this->get('motor_id'),
            'naziv' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'broj_sasije.required' => 'Polje broj šasije ne smije biti prazno!',
            'broj_sasije.unique' => 'Već postoji motor s tim brojem šasije!',
            'naziv.required' => 'Polje naziv motora ne smije biti prazno!',

        ];
    }
}
