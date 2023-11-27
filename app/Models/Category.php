<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\App;

class Category extends Model
{
    use HasFactory;

    public $table = 'category';

    private String $name;

    private String $description;

    private App $app;

    private function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    private function setDescription($description) {
        $this->description = $description;
    }

    public function getDescription() {
        return $this->description;
    }
}
