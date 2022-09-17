<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use APP\Interfaces\CategoryRepositoryInterface;
use APP\Interfaces\ProductRepositoryInterface;
use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use DateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Events\TransactionRolledBack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Readline\Transient;

class CategoryController extends Controller
{
    private CategoryRepositoryInterface $CategoryRepository;
    private ProductRepositoryInterface $productRepo;
    public function __construct(CategoryRepositoryInterface $repository, ProductRepositoryInterface $productRepo)
    {
        $this->CategoryRepository = $repository;
        $this->productRepo = $productRepo;
    }


    public function index()
    {
        $cat = $this->CategoryRepository->getAllCategories();
        $data = GenerateDropdownTree($cat);
        return response()->json(['data' => $data]);
        // return Product::find(2)->transactions;
        // $cat = $this->CategoryRepository->getAllCategories();
        // return $cat;
    }








    public function store(CategoryRequest $request)
    {
        $this->CategoryRepository->createCategory($request->all());
    }
    public function show($id)
    {
        $cat  =  $this->CategoryRepository->getCategoryById($id);
        return $cat;
    }

    public function update(CategoryRequest $request, $id)
    {
        $this->CategoryRepository->updateCategory($id, $request->all());
    }
    public function destroy($id)
    {
        $this->CategoryRepository->deleteCategory($id);
    }
}
