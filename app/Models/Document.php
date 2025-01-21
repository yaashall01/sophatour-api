<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $document_id
 * @property string $file_name
 * @property string $file_path
 * @property string $file_type
 * @property DevisPaiement[] $devisPaiements
 */
class Document extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'document';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'document_id';

    /**
     * @var array
     */
    protected $fillable = ['file_name', 'file_path', 'file_type'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function devisPaiements()
    {
        return $this->hasMany('App\Models\DevisPaiement', 'document', 'document_id');
    }
}
