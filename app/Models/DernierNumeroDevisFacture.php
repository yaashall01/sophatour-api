<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $societe_id
 * @property integer $numero_devis_facture
 * @property string $type
 * @property integer $annee
 * @property Societe $societe
 */
class DernierNumeroDevisFacture extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'dernier_numero_devis_facture';

    /**
     * @var array
     */
    protected $fillable = ['societe_id', 'numero_devis_facture', 'type', 'annee'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function societe()
    {
        return $this->belongsTo('App\Models\Societe', null, 'id_societe');
    }
}
