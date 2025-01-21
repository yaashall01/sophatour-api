<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    // /**
    //  * Determine if the user is authorized to make this request.
    //  */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'identifiant' => 'required|string',
            'mot_de_passe' => 'required|string',
        ];
    }

    public function message(){
        return [
            'identifiant.required' => 'The identifier field is required',
            'mot_de_passe.required' => 'The password field is required',
        ];
    }
}
