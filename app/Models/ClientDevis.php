<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_client_devis
 * @property integer $devis_objet
 * @property string $le_devis
 * @property string $a_devis
 * @property string $objet
 * @property string $date_d_entree
 * @property string $du_date
 * @property string $a_tel_date
 * @property integer $TVA
 * @property DevisObjet $devisObjet
 * @property ClientDevisClient[] $clientDevisClients
 * @property ClientFactureClient[] $clientFactureClients
 * @property ClientFactureClient[] $clientFactureClients
 * @property ClientLigneDevi[] $clientLigneDevis
 */
class ClientDevis extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_client_devis';

    /**
     * @var array
     */
    protected $fillable = ['devis_objet', 'le_devis', 'a_devis', 'objet', 'date_d_entree', 'du_date', 'a_tel_date', 'TVA'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function devisObjet()
    {
        return $this->belongsTo('App\Models\DevisObjet', 'devis_objet', 'id_devis_objet');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clientDevisClients()
    {
        return $this->hasMany('App\Models\ClientDevisClient', 'id_client_devis', 'id_client_devis');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clientFactureClients()
    {
        return $this->hasMany('App\Models\ClientFactureClient', 'id_client_devis', 'id_client_devis');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clientFactureClients()
    {
        return $this->hasMany('App\Models\ClientFactureClient', 'id_client_Facture', 'id_client_devis');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clientLigneDevis()
    {
        return $this->hasMany('App\Models\ClientLigneDevi', 'client_devis', 'id_client_devis');
    }
}
