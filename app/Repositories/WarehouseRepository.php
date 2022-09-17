<?php

namespace App\Repositories;

use App\Interfaces\WarehouseRepositoryInterface;
use App\Models\Transaction;
use App\Models\Warehouse;

class WarehouseRepository implements WarehouseRepositoryInterface
{

    public function getAllWarehouses()
    {
        return Warehouse::select("name", "place", "type")->get();
    }

    public function getWarehouseById($warehouseId)
    {
        return Warehouse::findOrFail($warehouseId);
    }

    public function deleteWarehouse($warehouseId)
    {
        $transaction = Transaction::query()
            ->select("id")
            ->where("sender_warehouse_id", $warehouseId)
            ->OrWhere("receiver_warehouse_id", $warehouseId)
            ->count();

        $warehouse = Warehouse::where('id', $warehouseId)->exists();
        if ($transaction == 0 && !empty($warehouse)) {
            Warehouse::destroy($warehouseId);
        } elseif ($transaction > 0) {
            return response()->json(['message' => $warehouse . ' nomreli Anbari sile bilmezsiniz'], 400);
        } else {
            return response()->json(['message' => $warehouseId . ' nomreli anbar tapilmadi'], 404);
        }
    }

    public function createWarehouse(array $warehouseDetails)
    {
        return Warehouse::create($warehouseDetails);
    }

    public function updateWarehouse($warehouseId, array $newWarehouseDetails)
    {
        return Warehouse::whereId($warehouseId)->update($newWarehouseDetails);
    }
}
