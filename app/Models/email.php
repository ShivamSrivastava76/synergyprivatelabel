<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class email extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'enquiry_id',
        'user_id',
        'email_content',
        'status',
    ];
    // / Define the relationship back to Enquiry
    public function enquiry()
    {
        return $this->belongsTo(enquiry::class);
    }
}
