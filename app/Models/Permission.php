<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'status',
    ];


    // Define the relationship with users
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_users', 'users_id', 'permissions_id')
                    ->withPivot('status')
                    ->withTimestamps();
    }

}
