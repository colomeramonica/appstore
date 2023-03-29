<?php

namespace App\Interfaces;

use App\Models\Category;

interface ApplicationRepositoryInterface
{
    public function getAllCategories();
    public function getCategoryById($categoryId);
    public function deleteCategory($categoryId);
    public function createCategory(Category $categoryData);
}
