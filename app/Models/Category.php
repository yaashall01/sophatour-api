<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $categories_id
 * @property string $categories_name
 * @property integer $categories_active
 * @property integer $categories_status
 * @property Product[] $products
 */
class Category extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'categories_id';

    /**
     * @var array
     */
    protected $fillable = ['categories_name', 'categories_active', 'categories_status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'categories_id', 'categories_id');
    }
}
