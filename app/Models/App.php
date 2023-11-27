<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    use HasFactory;

    protected $table = 'app';

    protected $primaryKey = 'app_id';

    public $incrementing = true;

    public $timestamps = true;

    protected $fillable = [
        'name',
        'description',
        'display_options',
        'status',
        'category_id',
        'developer_id'
    ];

    public static $availableOptions = [
        'Exibir em lojas específicas e ocultar do catálogo' => 1,
        'Exibir em todas as lojas e no catálogo' => 2,
        'Exibir em todas as lojas e ocultar do catálogo' => 3
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'apps_category', 'app_id', 'category_id');
    }

    public function developer()
    {
        return $this->belongsTo(Developer::class, 'developer_id');
    }
}
