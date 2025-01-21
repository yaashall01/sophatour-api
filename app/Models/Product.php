<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $product_id
 * @property integer $categories_id
 * @property integer $id_societe
 * @property string $product_name
 * @property string $product_image
 * @property string $quantity_initiale
 * @property integer $quantity
 * @property string $rate
 * @property integer $active
 * @property integer $status
 * @property Societe $societe
 * @property Category $category
 */
class Product extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'product';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'product_id';

    /**
     * @var array
     */
    protected $fillable = ['categories_id', 'id_societe', 'product_name', 'product_image', 'quantity_initiale', 'quantity', 'rate', 'active', 'status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function societe()
    {
        return $this->belongsTo('App\Models\Societe', 'id_societe', 'id_societe');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'categories_id', 'categories_id');
    }
}
