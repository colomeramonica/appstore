<?php

namespace App\Interfaces;

use App\Models\Category;

interface ApplicationRepositoryInterface
{
    public function getAllCategories();
    public function getCategoryById($appId);
    public function deleteCategory($appId);
    public function createCategory(Category $categoryData);
}
