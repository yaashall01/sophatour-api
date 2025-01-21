<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_ligne_devis_prestation
 * @property integer $client_ligne_devis_type_prestation
 * @property string $designation
 * @property string $prestation
 * @property ClientLigneDevi[] $clientLigneDevis
 * @property ClientLigneDevisTypePrestation $clientLigneDevisTypePrestation
 * @property Societe[] $societes
 */
class LigneDevisPrestation extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ligne_devis_prestation';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_ligne_devis_prestation';

    /**
     * @var array
     */
    protected $fillable = ['client_ligne_devis_type_prestation', 'designation', 'prestation'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clientLigneDevis()
    {
        return $this->hasMany('App\Models\ClientLigneDevi', 'ligne_devis_prestation', 'id_ligne_devis_prestation');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clientLigneDevisTypePrestation()
    {
        return $this->belongsTo('App\Models\ClientLigneDevisTypePrestation', 'client_ligne_devis_type_prestation', 'id_client_ligne_devis_type_prestation');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function societes()
    {
        return $this->belongsToMany('App\Models\Societe', 'societe_prestations', 'id_prestation', 'id_societe');
    }
}
