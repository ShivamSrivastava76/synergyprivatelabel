<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnquiryProduct extends Model
{
    protected $fillable = [
        'enquiries_id', 'products_id', 'status', 'customiable', 'Key', 'value'
    ];

    // Relationship to the Enquiry model
    public function enquiry()
    {
        return $this->belongsTo(enquiry::class, 'enquiries_id');
    }

    // Relationship to the Product model
    public function product()
    {
        return $this->belongsTo(product::class, 'products_id');
    }
}
