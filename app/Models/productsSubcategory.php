<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productsSubcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'subcategories_id',
        'products_id',
    ];
}
