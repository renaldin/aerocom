<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_Categories extends Model
{
    public function allData()
    {
        return DB::table('categories')->get();
    }

    public function dataForLanding($status)
    {
        return DB::table('categories')
            ->where('status', $status)
            ->get();
    }

    public function detail($id_categories)
    {
        return DB::table('categories')->where('id_categories', $id_categories)->first();
    }


    public function add($data)
    {
        DB::table('categories')->insert($data);
    }

    public function edit($id_categories, $data)
    {
        DB::table('categories')->where('id_categories', $id_categories)->update($data);
    }

    public function deleteData($id_categories)
    {
        DB::table('categories')->where('id_categories', $id_categories)->delete();
    }

    public function numberOfCategories()
    {
        return DB::table('categories')->count();
    }
}
