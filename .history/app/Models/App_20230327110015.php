<?php

namespace App\Models;

class App
{
    protected $attributes = [
        'name',
        'description',
        'display',
        'status',
        'category'
    ];

    public function setName($name)
    {
        $this->attributes['name'] = $name;
        return $this;
    }

    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
        return $this;
    }

    public function setStatus($status)
    {
        $this->attributes['status'] = $status;
        return $this;
    }

    public function generateFriendlyURL()
    {

    }
}
