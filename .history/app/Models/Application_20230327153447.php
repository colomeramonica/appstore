<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    public $table = 'application';

    private $appName;

    private $appDescription;

    private $summarizedDescription;

    private $status;

    private $displayOption;

    private $category;

    private $partner;

    /**
     *
     */
    private function setAppName($appName)
    {
        $this->appName = $appName;
        return $this;
    }

    public function getAppName()
    {
        return $this->appName;
    }

    protected $fillable = [
        'name',
        'description',
        'display_options',
        'status',
        'category_id',
        'partner_id'
    ];

    public static $availableOptions = [
        'Exibir em lojas específicas e ocultar do catálogo' => 1,
        'Exibir em todas lojas e no catálogo' => 2,
        'Exibir em todas lojas e ocultar do catálogo' => 3
    ];

    /**
     * Busca os aplicativos pelo id da categoria
     *
     * @param string $categoryId id da categoria
     * @return object Collection com os aplicativos
     */
    public function appsByCategoryId($categoryId)
    {
        return $this->belongsToMany(
            '\App\Models\Category',
            'name',
            'description',
            'status',
            'display_options',
        )
            ->withPivot('id')
            ->where('category_id', '=', $categoryId);
    }
}
