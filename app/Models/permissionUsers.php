<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permissionUsers extends Model
{
    use HasFactory;

    protected $fillable = [
        'permissions_id',
        'users_id',
        'status',
    ];
}
