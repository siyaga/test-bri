<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class MsProduct extends Model
{
    use HasUuids;

    protected $table = 'ms_product';

    protected $primaryKey = 'id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'namaproduct',
        'qty',
    ];
}
