<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enquiryEmails extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'enquiries_id',
        'emails_id',
        'status',
    ];
}
