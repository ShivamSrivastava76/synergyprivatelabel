<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\HearAboutOption;

class HearAbout extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'subject',
        'phone',
        'hear_about_options_id',
        'description',
    ];
    
    public function quote()
    {
        return $this->hasOne(HearAboutOption::class,  'id', 'hear_about_options_id');
    }
}
