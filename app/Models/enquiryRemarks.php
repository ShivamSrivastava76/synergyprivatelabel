<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enquiryRemarks extends Model
{
    use HasFactory;

    protected $fillable = [
        'enquiries_id',
        'remarks_id',
        'status',
    ];
}
