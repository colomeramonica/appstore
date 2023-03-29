<?php

namespace App\Models;

class App
{
    protected $attributes = [
        'nome' => 'name',
        'status' => 'status',
        'exibicao' => 'display',
        'categoria' => 'category'
    ];

    public function getName()
    {
        return $this->attributes['nome'];
    }
}
