<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\products_size;

class Product extends Model
{
    use HasFactory, SoftDeletes;


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
        'status' => 0, // Default status as active
        'price' => 0   // Default price as 0
    ];

    // Relationship with Category model
    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'products_sizes', 'products_id', 'sizes_id');
    }

    // Soft delete date field
    protected $dates = ['deleted_at'];
}
