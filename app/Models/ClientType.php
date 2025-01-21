<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_client_type
 * @property string $client_type
 * @property Client[] $clients
 */
class ClientType extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'client_type';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_client_type';

    /**
     * @var array
     */
    protected $fillable = ['client_type'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clients()
    {
        return $this->hasMany('App\Models\Client', 'client_type', 'id_client_type');
    }
}
