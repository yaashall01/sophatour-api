<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_devis_mode_paiements
 * @property string $libeller
 * @property DevisPaiement[] $devisPaiements
 */
class DevisModePaiement extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_devis_mode_paiements';

    /**
     * @var array
     */
    protected $fillable = ['libeller'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function devisPaiements()
    {
        return $this->hasMany('App\Models\DevisPaiement', 'devis_mode_paiements', 'id_devis_mode_paiements');
    }
}
