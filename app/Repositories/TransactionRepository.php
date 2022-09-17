<?php

namespace App\Repositories;

use App\Interfaces\TransactionRepositoryInterface;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\Response;
use Ramsey\Uuid\Type\Integer;

use function PHPUnit\Framework\returnSelf;

class TransactionRepository implements TransactionRepositoryInterface
{

    public function getAllTransactions()
    {
        return Transaction::select("sender_warehouse_id", "receiver_warehouse_id", "product_id", "Count", "Status")->get();
    }

    public function getTransactionById($transactionId)
    {
        return Transaction::findOrFail($transactionId);
    }

    public function createTransaction(array $TransactionDetails)
    {
        $isProductExists = Product::where("id", $TransactionDetails["product_id"])->exists();
        if (!Transaction::where("sender_warehouse_id", "=", $TransactionDetails["sender_warehouse_id"])->exists()) {
            return response()->json(["message" => "Girdiyiniz anbar tapilmadi"]);
        }
        if ($TransactionDetails["sender_warehouse_id"] !== null) {

            
            if (!$isProductExists) {
                return Response::json(['message' => 'Anbarda Bu mehsuldan yoxdur']);
            }
            $inProduct = (int)Transaction::where("receiver_warehouse_id", "=", $TransactionDetails["sender_warehouse_id"])
                ->where("product_id", "=", $TransactionDetails["product_id"])->sum("COUNT");

            $outProduct = (int)Transaction::where("sender_warehouse_id", "=", $TransactionDetails["sender_warehouse_id"])
                ->where("product_id", "=", $TransactionDetails["product_id"])->sum("COUNT");

            if ($inProduct - $outProduct > (int)$TransactionDetails["Count"]) {
                Transaction::create($TransactionDetails);
            } else {
                return Response::json(['message' => 'P'], 400);
            }




        } else {
            Transaction::create($TransactionDetails);
        }
    }
}
