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

    public function getName()
    {
        return $this->attributes['nome'];
    }
}
