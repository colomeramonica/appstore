<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppsCategory extends Model
{
    use HasFactory;

    protected $table = 'app_category';

    protected $fillable = [
        'app_id',
        'category_id'
    ];

    public $timestamps = true;

    public function app()
    {
        return $this->belongsTo(App::class, 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'id');
    }
}
