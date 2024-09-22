<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory, SoftDeletes;

    // Specify the table name if it's not the plural form of the model name
    protected $table = 'categories';

    // Specify the fields that can be mass-assigned
    protected $fillable = [
        'name',
        'description',
        'status'
    ];
}
