<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'nom_utilisateur' => 'required|string|max:255|unique:utilisateurs',
            'mot_de_passe' => 'required|string|min:6',
            'nom' => 'required|string|max:255|',
            'prenom' => 'required|string|max:255|',
            'email' => 'required|email|unique:utilisateurs',
            'telephone' => 'required|string|max:255|unique:utilisateurs',
            'profils' => 'required|exists:profils,id_profil',
        ];
    }

    public function messages()
    {
        return [
            'prenom.required' => 'Le nom est obligé.',
            'nom.required' => 'Le prenom est obligé.',
            'telephone.unique' => 'This phone number is already taken.',
            'nom_utilisateur.required' => 'The username is required.',
            'nom_utilisateur.unique' => 'This username is already taken.',
            'email.required' => 'The email is required.',
            'email.unique' => 'This email is already registered.',
            'mot_de_passe.required' => 'The password is required.',
            'mot_de_passe.confirmed' => 'The password confirmation does not match.',
        ];
    }
}
