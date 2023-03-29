<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    private string $collectionTitle;

    private int $products;

    private $fillable = [
        'title',
        'total_products',
    ];
}
