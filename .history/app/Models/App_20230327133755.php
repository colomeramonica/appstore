<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public $table = 'application';

    protected $fillable = [
        'name',
        'description',
        'display_options',
        'status',
        'category_id',
        'partner_id'
    ];

    public static $displayOptions = [
        'Exibir em lojas específicas e ocultar do catálogo' => 1,
        'Exibir em todas lojas e no catálogo' => 2,
        'Exibir em todas lojas e ocultar do catálogo' => 3
    ];

    public function appsByCategoryId()
    {
        return $this->belongsToMany(
            '\App\Models\Category'
        )
    }
}
