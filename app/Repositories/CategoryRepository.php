<?php

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{

    public function getAllCategories()
    {
        return Category::select("id", "name", "parent_id")->get();
    }

    public function getCategoryById($categoryId)
    {
        return Category::findOrFail($categoryId);
    }

    public function deleteCategory($categoryId)
    {
        Category::destroy($categoryId);
    }

    public function createCategory(array $CategoryDetails)
    {
        return Category::create($CategoryDetails);
    }

    public function updateCategory($orderId, array $newCategoryDetails)
    {
        return Category::whereId($orderId)->update($newCategoryDetails);
    }
}
