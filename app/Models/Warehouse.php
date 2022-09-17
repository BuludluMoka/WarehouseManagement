<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{

    protected $table = 'warehouse';
    protected $fillable = ['name', 'place', 'type', 'created_at', 'updated_at'];

    public function transactionSender()
    {
        return $this->hasMany(Transaction::class, 'sender_warehouse_id');
    }
    public function transactionReceiver()
    {
        return $this->hasMany(Transaction::class, 'receiver_warehouse_id');
    }
}
