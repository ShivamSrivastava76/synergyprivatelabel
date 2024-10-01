<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\product;
use App\Models\Subcategory;

class category extends Model
{
    use HasFactory, SoftDeletes;

    // Specify the fields that can be mass-assigned
    protected $fillable = [
        'name',
        'description',
        'status'
    ];

    public  function products()
    {
        return $this->belongsToMany(product::class, 'products_categories',   'categories_id', 'products_id' );
    }

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class, 'categories_id', 'id');
    }
}
