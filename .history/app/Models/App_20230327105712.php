<?php

namespace App\Models;

class App
{
    protected $attributes = [
        'name',
        'description',
        'display',
        'category'
    ];

    public function setName($name)
    {
        $this->attributes['name'] = $name;
        return $this;
    }
}
