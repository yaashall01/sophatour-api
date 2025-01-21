<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_secteur
 * @property string $Secteur
 * @property Client[] $clients
 */
class ClientSecteur extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'client_secteur';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_secteur';

    /**
     * @var array
     */
    protected $fillable = ['Secteur'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clients()
    {
        return $this->hasMany('App\Models\Client', 'client_secteur', 'id_secteur');
    }
}
