<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, SoftDeletes;


    // Define the fields that can be mass-assigned
    protected $fillable = [
        'name',
        'price',
        'description',
        'status',
        'features'
    ];

    // Define the default values for attributes
    protected $attributes = [
        'status' => 0, // Default status as active
        'price' => 0   // Default price as 0
    ];

    // Relationship with Category model
    public function category()
    {
        return $this->belongsTo(category::class, 'categories_id');
    }

    public function subcategories()
    {
        return $this->belongsToMany(Subcategory::class, 'products_subcategories', 'products_id', 'subcategories_id');
    }

    public function productsCategory()
    {
        return $this->belongsToMany(productsCategory::class, 'products_categories', 'products_id', 'categories_id');
    }

    public function productsSubcategory()
    {
        return $this->belongsToMany(productsSubcategory::class, 'products_subcategories', 'products_id', 'subcategories_id');
    }

    public function productsvariation()
    {
        return $this->belongsToMany(variation::class, 'variations', 'products_id', 'id');
    }
}
