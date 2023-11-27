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

    private String $name;

    private String $description;

    private bool $status;

    private int $displayOption;

    private Category $category;

    private Developer $developer;

    const APP_DISABLED = 0;

    const APP_ENABLED = 1;

    private function setName(String $name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    private function setDescription(String $description)
    {
        $this->description = $description;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
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
        'developer_id'
    ];

    public static $availableOptions = [
        'Exibir em lojas específicas e ocultar do catálogo' => 1,
        'Exibir em todas lojas e no catálogo' => 2,
        'Exibir em todas lojas e ocultar do catálogo' => 3
    ];
}
