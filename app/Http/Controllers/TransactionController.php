<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use APP\Interfaces\TransactionRepositoryInterface;
use App\Models\Transaction;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    private TransactionRepositoryInterface $transactionRepository;
    public function __construct(TransactionRepositoryInterface $repository)
    {
        $this->transactionRepository = $repository;
    }
    public function index()
    {
        return  $this->transactionRepository->getAllTransactions();
    }
    public function store(TransactionRequest $request)
    {
        return $this->transactionRepository->createTransaction($request->all());
    }
    public function show($id)
    {
        return  $this->transactionRepository->getTransactionById($id);
    }
}
