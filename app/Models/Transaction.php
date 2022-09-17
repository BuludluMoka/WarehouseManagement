<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['sender_warehouse_id', 'receiver_warehouse_id', 'product_id', 'Count', 'Status', 'created_at', 'updated_at'];

    public function anbar()
    {
        return $this->belongsTo(Anbar::class, 'id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, "id");
    }


    public function sender()
    {
        return $this->belongsTo(Anbar::class, "sender_warehouse_id");
    }
    public function receiver()
    {
        return $this->belongsTo(Anbar::class, "receiver_warehouse_id");
    }
}
