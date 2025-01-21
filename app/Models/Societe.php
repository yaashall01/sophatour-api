<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_societe
 * @property string $societe_name
 * @property string $path_image
 * @property string $all_name
 * @property Client[] $clients
 * @property DernierNumeroDevisFacture[] $dernierNumeroDevisFactures
 * @property Product[] $products
 * @property LigneDevisPrestation[] $ligneDevisPrestations
 * @property Utilisateur[] $utilisateurs
 */
class Societe extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_societe';

    /**
     * @var array
     */
    protected $fillable = ['societe_name', 'path_image', 'all_name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clients()
    {
        return $this->hasMany('App\Models\Client', 'id_societe', 'id_societe');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dernierNumeroDevisFactures()
    {
        return $this->hasMany('App\Models\DernierNumeroDevisFacture', null, 'id_societe');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'id_societe', 'id_societe');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function ligneDevisPrestations()
    {
        return $this->belongsToMany('App\Models\LigneDevisPrestation', 'societe_prestations', 'id_societe', 'id_prestation');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function utilisateurs()
    {
        return $this->belongsToMany('App\Models\Utilisateur', 'utilisateur_societes', 'id_societe', 'id_user');
    }
}
