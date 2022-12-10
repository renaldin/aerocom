<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_Products extends Model
{
    public function allData()
    {
        return DB::table('products')
            ->join('categories', 'categories.id_categories', '=', 'products.id_categories', 'left')
            ->orderBy('id_products', 'DESC')
            ->get();
    }

    public function detail($id_products)
    {
        return DB::table('products')
            ->join('categories', 'categories.id_categories', '=', 'products.id_categories', 'left')
            ->where('id_products', $id_products)
            ->first();
    }


    public function add($data)
    {
        DB::table('products')->insert($data);
    }

    public function edit($id_products, $data)
    {
        DB::table('products')->where('id_products', $id_products)->update($data);
    }

    public function deleteData($id_products)
    {
        DB::table('products')->where('id_products', $id_products)->delete();
    }
}
