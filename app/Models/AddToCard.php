<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class AddToCard extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'ip_address',
        'products_id',
        'Key',
        'value',
        'indices',
        'custom',
        'status',
    ];

    public  function products()
    {
        return $this->hasMany(product::class, 'id', 'products_id');
    }
}
