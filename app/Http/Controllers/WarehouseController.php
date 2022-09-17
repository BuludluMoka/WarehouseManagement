<?php

namespace App\Http\Controllers;

use App\Http\Requests\WarehouseRequest;
use APP\Interfaces\WarehouseRepositoryInterface;
use App\Models\Product;
use App\Models\Warehouse;
use DateTime;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    private WarehouseRepositoryInterface $warehouseRepository;
    public function __construct(WarehouseRepositoryInterface $repository)
    {
        $this->warehouseRepository = $repository;
    }

    public function index()
    {
        return $this->warehouseRepository->getAllWarehouses();
    }
    public function store(WarehouseRequest $request)
    {
        $this->warehouseRepository->createWarehouse($request->all());
    }
    public function show($id)
    {
        return $this->warehouseRepository->getWarehouseById($id);
    }

    public function update(WarehouseRequest $request, $id)
    {
        $this->warehouseRepository->updateWarehouse($id, $request->all());
    }
    public function destroy($id)
    {
        return $this->warehouseRepository->deleteWarehouse($id);
    }
}
