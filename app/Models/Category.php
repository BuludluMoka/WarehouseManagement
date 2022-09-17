<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ["name", "parent_id", "created_at", "updated_at"];

    public function childs()
    {
        return $this->hasMany('App\Category', 'parent_id', 'id');
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
