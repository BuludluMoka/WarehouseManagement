<?php




namespace APP\Interfaces;

interface CategoryRepositoryInterface
{
    public function getAllCategories();
    public function getCategoryById($categoryId);
    public function deleteCategory($categoryId);
    public function createCategory(array $orderDetails);
    public function updateCategory($categoryId, array $newDetails);
}
