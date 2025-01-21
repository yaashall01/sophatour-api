<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id_user' => $this->id_user,
            'nom_utilisateur' => $this->nom_utilisateur,
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'email' => $this->email,
            'telephone' => $this->telephone,
            'profil' => [
                'nom_profil' => $this->profil->nom_profil,
            ],
            'societes' => $this->societes->map(function ($societe) {
                return [
                    'nom_societe' => $societe->nom_societe,
                ];
            }),
        ];
    }
}
