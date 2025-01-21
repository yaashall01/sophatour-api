<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_c_responsable_interlocuteur
 * @property string $type_responsable_interlocuteur
 * @property ClientResponsableInterlocuteur[] $clientResponsableInterlocuteurs
 */
class CResponsableInterlocuteur extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'c_responsable_interlocuteur';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_c_responsable_interlocuteur';

    /**
     * @var array
     */
    protected $fillable = ['type_responsable_interlocuteur'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clientResponsableInterlocuteurs()
    {
        return $this->hasMany('App\Models\ClientResponsableInterlocuteur', 'c_responsable_interlocuteur', 'id_c_responsable_interlocuteur');
    }
}
