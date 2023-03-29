<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    public $table = 'application';

    private String $appName;

    private String $appDescription;

    private bool $status;

    private int $displayOption;

    private Category $category;

    private Partner $partner;

    const APP_DISABLED = 0;

    const APP_ENABLED = 1;

    private function setAppName(String $appName)
    {
        $this->appName = $appName;
        return $this;
    }

    public function getAppName()
    {
        return $this->appName;
    }

    private function setDescription(String $description)
    {
        $this->description = $description;
        return $this;
    }

    public function getDescription()
    {
        return $this->appDescription;
    }

    private function setStatus(bool $status)
    {
        $this->status = $status;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
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

    public function getAllApps()
    {

    }

    public function getAppById($appId)
    {

    }

    /**
     * Busca os aplicativos pelo id da categoria
     *
     * @param string $categoryId id da categoria
     * @return object Collection com os aplicativos
     */
    public function getAppByCategory($categoryId)
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
