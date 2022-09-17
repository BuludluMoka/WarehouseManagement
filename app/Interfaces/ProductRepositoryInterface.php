<?php




namespace APP\Interfaces;

interface ProductRepositoryInterface
{
    public function getAllProducts();
    public function getProductById($productId);
    public function deleteProduct($productId);
    public function createProduct(array $orderDetails);
    public function updateProduct($productId, array $newDetails);
}
