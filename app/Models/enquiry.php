<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory,  SoftDeletes;

    protected $fillable = [
        'user_id',
        'ip_address',
        'customiable'
    ];

    // Relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship to the EnquiryProduct model
    public function enquiryProducts()
    {
        return $this->hasMany(EnquiryProduct::class, 'enquiries_id');
    }
    public function remarks()
    {
        return $this->hasMany(Remark::class)->orderBy('created_at', 'asc');
    }
    public function emails()
    {
        return $this->hasMany(Email::class);
    }
}
