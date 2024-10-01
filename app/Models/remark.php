<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class remark extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'enquiry_id',
        'user_id',
        'remark',
        'status',
    ];

    // You can add relationships if necessary, like:
    public function enquiry()
    {
        return $this->belongsTo(enquiry::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
