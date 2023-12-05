<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;

    public $table = 'developer';

    public $incrementing = true;

    public $timestamps = true;

    protected $fillable = [
        'company_name',
        'contact_email',
        'contact_phone'
    ];
}
