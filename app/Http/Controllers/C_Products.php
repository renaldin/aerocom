<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Products;
use App\Models\M_Categories;

class C_Products extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->M_Products = new M_Products();
        $this->M_Categories = new M_Categories();
    }

    public function index()
    {

        $data = [
            'sidebarTitle' => 'Products',
            'products' => $this->M_Products->allData()
        ];
        return view('products/v_products', $data);
    }

    public function add()
    {
        $data = [
            'sidebarTitle' => 'Products',
            'categories' => $this->M_Categories->allData()
        ];
        return view('products/v_add', $data);
    }

    public function insert()
    {
        Request()->validate([
            'products_name'     => 'required',
            'id_categories'     => 'required',
            'description'       => 'required',
            'image'             => 'required|mimes:jpg,jpeg,png,bmp|max:1024',
        ], [
            'products_name.required'    => 'Product Name is required !',
            'id_categories.required'    => 'Categorie is required !',
            'description.required'      => 'Description is required !',
            'image.required'            => 'Image is required !',
            'image.mimes'               => 'Image is jpg, jpeg, png !',
        ]);

        $file = Request()->image;
        $fileName = date('mdYHis') . Request()->id_products . '.' . $file->extension();
        $file->move(public_path('foto_product'), $fileName);

        $data = [
            'products_name' => Request()->products_name,
            'id_categories' => Request()->id_categories,
            'description'   => Request()->description,
            'image'         => $fileName,
        ];

        $this->M_Products->add($data);
        return redirect()->route('products')->with('pesan', 'Data Saved Successfully !');
    }

    public function edit($id_products)
    {
        if (!$this->M_Products->detail($id_products)) {
            abort(404);
        }

        $data = [
            'sidebarTitle' => 'Products',
            'categories' => $this->M_Categories->allData(),
            'product' => $this->M_Products->detail($id_products)
        ];

        return view('products/v_edit', $data);
    }

    public function update($id_products)
    {
        Request()->validate([
            'products_name'     => 'required',
            'id_categories'     => 'required',
            'description'       => 'required',
            'image'             => 'mimes:jpg,jpeg,png,bmp|max:1024',
        ], [
            'products_name.required'    => 'Product Name is required !',
            'id_categories.required'    => 'Categorie is required !',
            'description.required'      => 'Description is required !',
            'image.mimes'               => 'Image is jpg, jpeg, png !',
        ]);

        if (Request()->image <> "") {
            $product = $this->M_Products->detail($id_products);
            if ($product->image <> "") {
                unlink(public_path('foto_product') . '/' . $product->image);
            }

            $file = Request()->image;
            $fileName = date('mdYHis') . Request()->id . '.' . $file->extension();
            $file->move(public_path('foto_product'), $fileName);

            $data = [
                'products_name' => Request()->products_name,
                'id_categories' => Request()->id_categories,
                'description'   => Request()->description,
                'image'         => $fileName,
            ];
            $this->M_Products->edit($id_products, $data);
        } else {
            //jika tidak ganti gambar/foto
            $data = [
                'products_name' => Request()->products_name,
                'id_categories' => Request()->id_categories,
                'description'   => Request()->description
            ];
            $this->M_Products->edit($id_products, $data);
        }

        return redirect()->route('products')->with('pesan', 'Data Updated Successfully !');
    }

    public function delete($id_products)
    {
        //hapus atau delete foto
        $product = $this->M_Products->detail($id_products);
        if ($product->image <> "") {
            unlink(public_path('foto_product') . '/' . $product->image);
        }
        $this->M_Products->deleteData($id_products);
        return redirect()->route('products')->with('pesan', 'Data Deleted Successfully !');
    }
}
