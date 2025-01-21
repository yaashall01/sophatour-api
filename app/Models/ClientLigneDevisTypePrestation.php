<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_client_ligne_devis_type_prestation
 * @property string $ligne_devis_type_prestation
 * @property ClientLigneDevi[] $clientLigneDevis
 * @property LigneDevisPrestation[] $ligneDevisPrestations
 */
class ClientLigneDevisTypePrestation extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'client_ligne_devis_type_prestation';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_client_ligne_devis_type_prestation';

    /**
     * @var array
     */
    protected $fillable = ['ligne_devis_type_prestation'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clientLigneDevis()
    {
        return $this->hasMany('App\Models\ClientLigneDevi', 'client_ligne_devis_type_prestation', 'id_client_ligne_devis_type_prestation');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ligneDevisPrestations()
    {
        return $this->hasMany('App\Models\LigneDevisPrestation', 'client_ligne_devis_type_prestation', 'id_client_ligne_devis_type_prestation');
    }
}
