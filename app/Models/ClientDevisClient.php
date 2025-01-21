<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_client_devis
 * @property integer $id_client
 * @property integer $utilisateurs
 * @property integer $id_annulation_cause
 * @property float $version_devis
 * @property string $Numero_devis
 * @property float $prix_total_ttc
 * @property boolean $confirmer
 * @property boolean $annuler
 * @property string $anuulation_cause
 * @property Client $client
 * @property AnnulationCause $annulationCause
 * @property ClientDevi $clientDevi
 * @property Utilisateur $utilisateur
 * @property DevisPaiement[] $devisPaiements
 */
class ClientDevisClient extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'client_devis_client';

    /**
     * @var array
     */
    protected $fillable = ['utilisateurs', 'id_annulation_cause', 'version_devis', 'Numero_devis', 'prix_total_ttc', 'confirmer', 'annuler', 'anuulation_cause'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'id_client', 'id_client');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function annulationCause()
    {
        return $this->belongsTo('App\Models\AnnulationCause', 'id_annulation_cause', 'id_annulation_cause');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clientDevi()
    {
        return $this->belongsTo('App\Models\ClientDevi', 'id_client_devis', 'id_client_devis');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function utilisateur()
    {
        return $this->belongsTo('App\Models\Utilisateur', 'utilisateurs', 'id_user');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function devisPaiements()
    {
        return $this->hasMany('App\Models\DevisPaiement', 'client_devis_client', 'id_client_devis');
    }
}
