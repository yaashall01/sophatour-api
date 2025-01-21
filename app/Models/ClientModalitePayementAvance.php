<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_client_modalite_payement_avance
 * @property integer $clients
 * @property integer $pourcentage
 * @property integer $etalonage
 * @property boolean $semaine
 * @property boolean $mois
 * @property Client $client
 */
class ClientModalitePayementAvance extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'client_modalite_payement_avance';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_client_modalite_payement_avance';

    /**
     * @var array
     */
    protected $fillable = ['clients', 'pourcentage', 'etalonage', 'semaine', 'mois'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'clients', 'id_client');
    }
}
