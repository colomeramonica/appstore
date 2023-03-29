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

    private function setTitle($title)
    {
        $this->collectionTitle = $title;
        return $this;
    }

    public function getTitle()
    {
        return $this->collectionTitle;
    }

    private function setTotalProducts($totalProducts)
    {
        $this->totalProducts = $totalProducts;
        return $this;
    }

    public function getTotalProducts()
    {
        return $this->totalProducts;
    }
}
