<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public $table = 'application';

    protected $fillable = [
        'name',
        'description',
        'display',
        'status',
        'category'
    ];
}
