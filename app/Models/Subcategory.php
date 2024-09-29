<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'categories_id',
        'status',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_subcategories', 'subcategories_id', 'products_id');
    }
}
