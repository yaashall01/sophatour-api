<?php
namespace App\Services;

use App\Models\Utilisateur;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UtilisateurService
{
    public function getUtilisateurs($perPage = 10)
    {
        return Utilisateur::with('profil')->paginate($perPage);
    }

    public function getUtilisateur($id)
    {
        return Utilisateur::with('profil')->find($id);
    }

    public function createUtilisateur(array $data)
    {
        $validator = Validator::make($data, [
            'nom_utilisateur' => 'required|unique:utilisateurs',
            'mot_de_passe' => 'required|min:6',
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:utilisateurs',
            'telephone' => 'required',
            'profils' => 'required|exists:profils,id_profil',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $data['mot_de_passe'] = bcrypt($data['mot_de_passe']);
        return Utilisateur::create($data);
    }

    public function updateUtilisateur($id, array $data)
    {
        $utilisateur = Utilisateur::find($id);
        if (!$utilisateur) {
            return null;
        }

        $validator = Validator::make($data, [
            'nom_utilisateur' => 'sometimes|unique:utilisateurs,nom_utilisateur,' . $utilisateur->id_user . ',id_user',
            'mot_de_passe' => 'sometimes|min:6',
            'nom' => 'sometimes',
            'prenom' => 'sometimes',
            'email' => 'sometimes|email|unique:utilisateurs,email,' . $utilisateur->id_user . ',id_user',
            'telephone' => 'sometimes',
            'profils' => 'sometimes|exists:profils,id_profil',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        if (isset($data['mot_de_passe'])) {
            $data['mot_de_passe'] = bcrypt($data['mot_de_passe']);
        }

        $utilisateur->update($data);
        return $utilisateur;
    }

    public function deleteUtilisateur($id)
    {
        $utilisateur = Utilisateur::find($id);
        if (!$utilisateur) {
            return false;
        }

        $utilisateur->delete();
        return true;
    }
}