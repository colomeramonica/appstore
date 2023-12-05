<?php

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAllCategories()
    {
        $categories = Category::all();

        return $categories;
    }

    public function getCategoryById($categoryId)
    {
        $category = Category::where([
            'status' => 1,
            'id' => $categoryId
        ])->first();

        return $category;
    }

    public function deleteCategory($categoryId)
    {
        //
    }

    public function createCategory($data)
    {
        $category = new Category;

        $category->name = $data['name'];
        $category->description = $data['description'];

        $category->save();

        return $category;
    }
}