<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class App extends Model
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
