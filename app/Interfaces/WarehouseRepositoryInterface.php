<?php




namespace APP\Interfaces;

interface WarehouseRepositoryInterface
{
    public function getAllWarehouses();
    public function getWarehouseById($warehouseId);
    public function deleteWarehouse($warehouseId);
    public function createWarehouse(array $orderDetails);
    public function updateWarehouse($warehouseId, array $newDetails);
}
