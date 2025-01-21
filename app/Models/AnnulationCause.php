<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_annulation_cause
 * @property string $libeller
 * @property ClientDevisClient[] $clientDevisClients
 */
class AnnulationCause extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'annulation_cause';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_annulation_cause';

    /**
     * @var array
     */
    protected $fillable = ['libeller'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clientDevisClients()
    {
        return $this->hasMany('App\Models\ClientDevisClient', 'id_annulation_cause', 'id_annulation_cause');
    }
}
