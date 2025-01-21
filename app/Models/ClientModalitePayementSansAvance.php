<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_client_modalite_payement_sans_avance
 * @property integer $clients
 * @property boolean $Totalite
 * @property integer $etalonage
 * @property boolean $semaine
 * @property boolean $mois
 * @property Client $client
 */
class ClientModalitePayementSansAvance extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'client_modalite_payement_sans_avance';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_client_modalite_payement_sans_avance';

    /**
     * @var array
     */
    protected $fillable = ['clients', 'Totalite', 'etalonage', 'semaine', 'mois'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'clients', 'id_client');
    }
}
