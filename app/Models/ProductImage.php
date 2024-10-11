<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'products_id',
        'image',
        'status',
    ];
}
