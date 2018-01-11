<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class CheckMail extends FormRequest
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
            'ime' => 'required',
            'mail' => 'required|email',
            'poruka' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'ime.required' => 'Polje "Vaše ime" ne smije biti prazno!',
            'mail.required' => 'Polje "Vaš email" ne smije biti prazno!',
            'mail.email' => 'Molim Vas upišite važeću email adresu',
            'poruka.required' => 'Polje "Poruka" ne smije biti prazno!',

        ];
    }
}
