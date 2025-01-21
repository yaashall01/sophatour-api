<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_client_ligne_devis
 * @property integer $client_ligne_devis_type_prestation
 * @property integer $client_devis
 * @property integer $ligne_devis_prestation
 * @property string $prestation
 * @property float $unite
 * @property float $nbr_jour
 * @property float $pu_ht
 * @property float $pt_ht
 * @property ClientDevi $clientDevi
 * @property ClientLigneDevisTypePrestation $clientLigneDevisTypePrestation
 * @property LigneDevisPrestation $ligneDevisPrestation
 */
class ClientLigneDevis extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_client_ligne_devis';

    /**
     * @var array
     */
    protected $fillable = ['client_ligne_devis_type_prestation', 'client_devis', 'ligne_devis_prestation', 'prestation', 'unite', 'nbr_jour', 'pu_ht', 'pt_ht'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clientDevi()
    {
        return $this->belongsTo('App\Models\ClientDevi', 'client_devis', 'id_client_devis');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clientLigneDevisTypePrestation()
    {
        return $this->belongsTo('App\Models\ClientLigneDevisTypePrestation', 'client_ligne_devis_type_prestation', 'id_client_ligne_devis_type_prestation');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ligneDevisPrestation()
    {
        return $this->belongsTo('App\Models\LigneDevisPrestation', 'ligne_devis_prestation', 'id_ligne_devis_prestation');
    }
}
