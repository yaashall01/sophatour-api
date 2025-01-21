<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_devis_objet
 * @property string $nom_objet
 * @property ClientDevi[] $clientDevis
 */
class DevisObjet extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'devis_objet';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_devis_objet';

    /**
     * @var array
     */
    protected $fillable = ['nom_objet'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clientDevis()
    {
        return $this->hasMany('App\Models\ClientDevi', 'devis_objet', 'id_devis_objet');
    }
}
