<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_devis_paiements
 * @property integer $client_devis_client
 * @property integer $document
 * @property integer $devis_mode_paiements
 * @property string $statut
 * @property float $Montant
 * @property boolean $avec_exoneration
 * @property string $created
 * @property string $commentaire
 * @property ClientDevisClient $clientDevisClient
 * @property DevisModePaiement $devisModePaiement
 * @property Document $document
 */
class DevisPaiement extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_devis_paiements';

    /**
     * @var array
     */
    protected $fillable = ['client_devis_client', 'document', 'devis_mode_paiements', 'statut', 'Montant', 'avec_exoneration', 'created', 'commentaire'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clientDevisClient()
    {
        return $this->belongsTo('App\Models\ClientDevisClient', 'client_devis_client', 'id_client_devis');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function devisModePaiement()
    {
        return $this->belongsTo('App\Models\DevisModePaiement', 'devis_mode_paiements', 'id_devis_mode_paiements');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function document()
    {
        return $this->belongsTo('App\Models\Document', 'document', 'document_id');
    }
}
