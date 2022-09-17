<?php




namespace APP\Interfaces;

interface TransactionRepositoryInterface
{
    public function getAllTransactions();
    public function getTransactionById($transactionId);
    public function createTransaction(array $trancationDetails);
}
