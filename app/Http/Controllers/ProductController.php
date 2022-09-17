<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use APP\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use DateTime;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private ProductRepositoryInterface $productRepository;
    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->productRepository = $repository;
    }

    public function index()
    {
        $product = $this->productRepository->getAllProducts();
        return $product;
    }
    public function store(ProductStoreRequest $request)
    {
        $product = $this->productRepository->createProduct($request->all());
    }
    public function show($id)
    {
        $product = $this->productRepository->getProductById($id);
        return $product;
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        $product = $this->productRepository->updateProduct($id, $request->all());

      
    }
    public function destroy($id)
    {
        $product = $this->productRepository->deleteProduct($id);
      
    }
}
