<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property integer $id_user
 * @property integer $profils
 * @property string $nom_utilisateur
 * @property string $mot_de_passe
 * @property string $nom
 * @property string $prenom
 * @property string $email
 * @property string $telephone
 * @property Client[] $clients
 * @property ClientDevisClient[] $clientDevisClients
 * @property ClientFactureClient[] $clientFactureClients
 * @property Profil $profil
 * @property Societe[] $societes
 */
class Utilisateur extends Authenticatable implements JWTSubject
{

    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_user';

    /**
     * @var array
     */
    protected $fillable = ['profils', 'nom_utilisateur', 'mot_de_passe', 'nom', 'prenom', 'email', 'telephone'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clients()
    {
        return $this->hasMany('App\Models\Client', 'utilisateurs', 'id_user');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clientDevisClients()
    {
        return $this->hasMany('App\Models\ClientDevisClient', 'utilisateurs', 'id_user');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clientFactureClients()
    {
        return $this->hasMany('App\Models\ClientFactureClient', 'utilisateurs', 'id_user');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profil()
    {
        return $this->belongsTo('App\Models\Profil', 'profils', 'id_profil');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function societes()
    {
        return $this->belongsToMany('App\Models\Societe', 'utilisateur_societes', 'id_user', 'id_societe');
    }

    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }

        /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
            'id_user' => $this->id_user,
            'nom_utilisateur' => $this->nom_utilisateur,
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'email' => $this->email,
            'telephone' => $this->telephone,
            // 'profils' => $this->profils,
            'nom_societe' => $this->societes,
            'nom_profil' => $this->profil->nom_profil,
        ];
    }
}
