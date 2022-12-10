<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_Users extends Model
{
    public function allData()
    {
        return DB::table('users')->get();
    }

    public function detail($id_user)
    {
        return DB::table('users')->where('id', $id_user)->first();
    }

    public function add($data)
    {
        DB::table('users')->insert($data);
    }

    public function edit($id_users, $data)
    {
        DB::table('users')->where('id', $id_users)->update($data);
    }

    public function deleteData($id_user)
    {
        DB::table('users')->where('id', $id_user)->delete();
    }

    public function numberOfUsers()
    {
        return DB::table('users')->count();
    }

    public function checkPassword($password)
    {
        return DB::table('users')->where('password', $password)->first();
    }
}
