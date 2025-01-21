<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_client_responsable_interlocuteur
 * @property integer $c_responsable_interlocuteur
 * @property integer $clients
 * @property string $nom_complet
 * @property string $email
 * @property string $numero_telephone
 * @property CResponsableInterlocuteur $cResponsableInterlocuteur
 * @property Client $client
 */
class ClientResponsableInterlocuteur extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'client_responsable_interlocuteur';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_client_responsable_interlocuteur';

    /**
     * @var array
     */
    protected $fillable = ['c_responsable_interlocuteur', 'clients', 'nom_complet', 'email', 'numero_telephone'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cResponsableInterlocuteur()
    {
        return $this->belongsTo('App\Models\CResponsableInterlocuteur', 'c_responsable_interlocuteur', 'id_c_responsable_interlocuteur');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'clients', 'id_client');
    }
}
