<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_News;
use Illuminate\Support\Facades\Auth;

class C_News extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->M_News = new M_News();
    }

    public function index()
    {

        $data = [
            'sidebarTitle' => 'News',
            'news' => $this->M_News->allData()
        ];
        return view('news/v_news', $data);
    }

    public function add()
    {
        $data = [
            'sidebarTitle' => 'News'
        ];
        return view('news/v_add', $data);
    }

    public function insert()
    {
        Request()->validate([
            'title'         => 'required|unique:news,title',
            'news'          => 'required',
            'status'        => 'required',
            'date'          => 'required',
            'news_image'    => 'required|mimes:jpg,jpeg,png,bmp|max:1024',
        ], [
            'title.required'        => 'Title is required !',
            'news.required'         => 'News is required !',
            'status.required'       => 'Status is required !',
            'date.required'         => 'Date is required !',
            'news_image.required'   => 'Image is required !',
            'news_image.mimes'      => 'Image is jpg, jpeg, png !',
        ]);

        $file = Request()->news_image;
        $fileName = date('mdYHis') . Request()->id_news . '.' . $file->extension();
        $file->move(public_path('foto_news'), $fileName);

        $data = [
            'id_users'      => Auth::user()->id,
            'title'         => Request()->title,
            'news'          => Request()->news,
            'status'        => Request()->status,
            'date'          => Request()->date,
            'news_image'    => $fileName,
        ];

        $this->M_News->add($data);
        return redirect()->route('news')->with('pesan', 'Data Saved Successfully !');
    }

    public function edit($id_news)
    {
        if (!$this->M_News->detail($id_news)) {
            abort(404);
        }

        $data = [
            'sidebarTitle' => 'News',
            'news' => $this->M_News->detail($id_news)
        ];

        return view('news/v_edit', $data);
    }

    public function update($id_news)
    {
        Request()->validate([
            'title'         => 'required|unique:news,title',
            'news'          => 'required',
            'status'        => 'required',
            'date'          => 'required',
            'news_image'    => 'mimes:jpg,jpeg,png,bmp|max:1024',
        ], [
            'title.required'        => 'Title is required !',
            'news.required'         => 'News is required !',
            'status.required'       => 'Status is required !',
            'date.required'         => 'Date is required !',
            'news_image.mimes'      => 'Image is jpg, jpeg, png !',
        ]);

        if (Request()->news_image <> "") {
            $news = $this->M_News->detail($id_news);
            if ($news->news_image <> "") {
                unlink(public_path('foto_news') . '/' . $news->news_image);
            }

            $file = Request()->news_image;
            $fileName = date('mdYHis') . Request()->id_news . '.' . $file->extension();
            $file->move(public_path('foto_news'), $fileName);

            $data = [
                'id_users'      => Auth::user()->id,
                'title'         => Request()->title,
                'news'          => Request()->news,
                'status'        => Request()->status,
                'date'          => Request()->date,
                'news_image'    => $fileName,
            ];
            $this->M_News->edit($id_news, $data);
        } else {
            //jika tidak ganti gambar/foto
            $data = [
                'id_users'      => Auth::user()->id,
                'title'         => Request()->title,
                'news'          => Request()->news,
                'status'        => Request()->status,
                'date'          => Request()->date,
            ];
            $this->M_News->edit($id_news, $data);
        }

        return redirect()->route('news')->with('pesan', 'Data Updated Successfully !');
    }

    public function delete($id_news)
    {
        //hapus atau delete foto
        $news = $this->M_News->detail($id_news);
        if ($news->news_image <> "") {
            unlink(public_path('foto_news') . '/' . $news->news_image);
        }
        $this->M_News->deleteData($id_news);
        return redirect()->route('news')->with('pesan', 'Data Deleted Successfully !');
    }
}
