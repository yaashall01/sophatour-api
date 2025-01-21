<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_client
 * @property integer $utilisateurs
 * @property integer $client_type
 * @property integer $client_secteur
 * @property integer $id_societe
 * @property string $societe
 * @property string $nom_complet
 * @property string $ice
 * @property string $rc
 * @property string $adresse
 * @property string $date_d_entree
 * @property boolean $avance
 * @property boolean $Agence_evementiel
 * @property ClientType $clientType
 * @property Societe $societe
 * @property Utilisateur $utilisateur
 * @property ClientSecteur $clientSecteur
 * @property ClientDevisClient[] $clientDevisClients
 * @property ClientFactureClient[] $clientFactureClients
 * @property ClientModalitePayementAvance[] $clientModalitePayementAvances
 * @property ClientModalitePayementSansAvance[] $clientModalitePayementSansAvances
 * @property ClientResponsableInterlocuteur[] $clientResponsableInterlocuteurs
 */
class Client extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_client';

    /**
     * @var array
     */
    protected $fillable = ['utilisateurs', 'client_type', 'client_secteur', 'id_societe', 'societe', 'nom_complet', 'ice', 'rc', 'adresse', 'date_d_entree', 'avance', 'Agence_evementiel'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clientType()
    {
        return $this->belongsTo('App\Models\ClientType', 'client_type', 'id_client_type');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function societe()
    {
        return $this->belongsTo('App\Models\Societe', 'id_societe', 'id_societe');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function utilisateur()
    {
        return $this->belongsTo('App\Models\Utilisateur', 'utilisateurs', 'id_user');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clientSecteur()
    {
        return $this->belongsTo('App\Models\ClientSecteur', 'client_secteur', 'id_secteur');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clientDevisClients()
    {
        return $this->hasMany('App\Models\ClientDevisClient', 'id_client', 'id_client');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clientFactureClients()
    {
        return $this->hasMany('App\Models\ClientFactureClient', 'id_client', 'id_client');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clientModalitePayementAvances()
    {
        return $this->hasMany('App\Models\ClientModalitePayementAvance', 'clients', 'id_client');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clientModalitePayementSansAvances()
    {
        return $this->hasMany('App\Models\ClientModalitePayementSansAvance', 'clients', 'id_client');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clientResponsableInterlocuteurs()
    {
        return $this->hasMany('App\Models\ClientResponsableInterlocuteur', 'clients', 'id_client');
    }
}
