<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    private string $collectionTitle;

    private int $totalProducts;

    protected $fillable = [
        'title',
    ];

    public function setTitle($title)
    {
        $this->collectionTitle = $title;
        return $this;
    }
}
