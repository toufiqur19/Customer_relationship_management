<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'contact_name',
        'contact_email',
        'contact_phone',
        'company_name',
        'company_address',
        'company_city',
        'company_zip',
        'company_vat',
    ];
}
