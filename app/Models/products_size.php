<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products_size extends Model
{
    use HasFactory;

    protected $fillable = [
        'sizes_id',
        'products_id',
    ];

}
