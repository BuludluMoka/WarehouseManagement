<?php

use App\Models\Product;
use App\Models\Transaction;
use Ramsey\Uuid\Type\Integer;
use Symfony\Component\CssSelector\Node\FunctionNode;




function GenerateDropdownTree($datas) {
    $tree = [];
    foreach ($datas as $data) {

        $tree[] = array(
            'key' => $data->id, 
            'value' => $data->id,
            'title' => $data->name
        );

    }

    return $tree;
}
// class Insan
// {
//     public $name = "Moka Buludlu";
//     public function nameUpper()
//     {
//         return $this->name = strtoupper($this->name);
//     }
// }
// class B extends Insan
// {
//     public function nameUpper()
//     {
//         return $this->name = strtolower($this->name);
//     }
// }

// function test12($a)
// {
//     return;
// }
// function buildTree(array &$elements, $parentId = 0)
// {

//     $branch = array();
//     foreach ($elements as $element) {
//         if ($element['parent_id'] == $parentId) {
//             $children = buildTree($elements, $element['id']);
//             if ($children) {
//                 $element['children'] = $children;
//             }
//             $branch[$element['id']] = $element;
//         }
//     }
//     return $branch;
// }

// function checkIfExist()
// {
// }
// function checkProductCount($senderId, $productId, $productCount): bool
// {
//     $product = Product::find($productId);
//     if (Transaction["sender_warehouse_id"]) {
//     }
//     $warehouseTr = Transaction::query();
//     return true;
// }
