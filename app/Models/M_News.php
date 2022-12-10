<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_News extends Model
{
    public function allData()
    {
        return DB::table('news')
            ->join('users', 'users.id', '=', 'news.id_users', 'left')
            ->orderBy('id_news', 'DESC')
            ->get();
    }

    public function detail($id_news)
    {
        return DB::table('news')
            ->join('users', 'users.id', '=', 'news.id_users', 'left')
            ->where('id_news', $id_news)
            ->first();
    }

    public function add($data)
    {
        DB::table('news')->insert($data);
    }

    public function edit($id_news, $data)
    {
        DB::table('news')->where('id_news', $id_news)->update($data);
    }

    public function deleteData($id_news)
    {
        DB::table('news')->where('id_news', $id_news)->delete();
    }
}
