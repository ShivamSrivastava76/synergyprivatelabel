<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    // Optional: Only needed if your table name is not 'products'
    protected $table = 'products';

    // Define the fields that can be mass-assigned
    protected $fillable = [
        'name',
        'categories_id',
        'price',
        'image',
        'description',
        'status'
    ];

    // Define the default values for attributes
    protected $attributes = [
        'status' => 1, // Default status as active
        'price' => 0   // Default price as 0
    ];

    // Relationship with Category model
    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }
    // Define the relationship with the EnquiryProduct model
    public function enquiryProducts()
    {
        return $this->hasMany(EnquiryProduct::class, 'products_id');
    }

    // Soft delete date field
    protected $dates = ['deleted_at'];
}
