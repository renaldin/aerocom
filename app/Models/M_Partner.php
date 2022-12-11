<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_Partner extends Model
{
    public function allData()
    {
        return DB::table('partner')->get();
    }

    public function detail($id_partner)
    {
        return DB::table('partner')->where('id_partner', $id_partner)->first();
    }

    public function add($data)
    {
        DB::table('partner')->insert($data);
    }

    public function edit($id_partner, $data)
    {
        DB::table('partner')->where('id_partner', $id_partner)->update($data);
    }

    public function deleteData($id_partner)
    {
        DB::table('partner')->where('id_partner', $id_partner)->delete();
    }

    public function numberOfPartner()
    {
        return DB::table('partner')->count();
    }
}
