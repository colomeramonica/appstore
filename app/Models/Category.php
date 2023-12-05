<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\App;

class Category extends Model
{
    use HasFactory;

    public $table = 'category';

    protected $fillable = [
        'name',
        'description',
        'status'
    ];

    public function app()
    {
        return $this->belongsToMany(App::class, 'app_category', 'app_id', 'category_id');
    }
}
