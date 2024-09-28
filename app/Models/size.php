<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'size',
        'status'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_sizes', 'sizes_id', 'products_id');
    }
}
