<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_profil
 * @property string $nom_profil
 * @property Utilisateur[] $utilisateurs
 */
class Profil extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_profil';

    /**
     * @var array
     */
    protected $fillable = ['nom_profil'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function utilisateurs()
    {
        return $this->hasMany('App\Models\Utilisateur', 'profils', 'id_profil');
    }
}
