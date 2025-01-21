<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_client_devis
 * @property integer $id_client
 * @property integer $utilisateurs
 * @property integer $id_client_Facture
 * @property string $Numero_Facture
 * @property float $prix_total_ttc
 * @property ClientDevi $clientDevi
 * @property Utilisateur $utilisateur
 * @property ClientDevi $clientDevi
 * @property Client $client
 */
class ClientFactureClient extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'client_facture_client';

    /**
     * @var array
     */
    protected $fillable = ['utilisateurs', 'Numero_Facture', 'prix_total_ttc'];

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clientDevi()
    {
        return $this->belongsTo('App\Models\ClientDevi', 'id_client_Facture', 'id_client_devis');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'id_client', 'id_client');
    }
}
