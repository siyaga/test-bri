<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class MsProduct extends Model
{
    use HasUuids;

    protected $table = 'ms_product';

    protected $primaryKey = 'id';

    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'namaproduct',
        'qty',
    ];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }
}
