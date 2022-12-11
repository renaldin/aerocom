<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Categories;

class C_Categories extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->M_Categories = new M_Categories();
    }

    public function index()
    {

        $data = [
            'sidebarTitle' => 'Categories',
            'categories' => $this->M_Categories->allData()
        ];
        return view('categories/v_categories', $data);
    }

    public function add()
    {
        $data = [
            'sidebarTitle' => 'Categories',
        ];
        return view('categories/v_add', $data);
    }

    public function insert()
    {
        Request()->validate([
            'categories_name'   => 'required|unique:categories,categories_name',
            'status'            => 'required',
        ], [
            'categories_name.required'  => 'Categories Name is required !',
            'status.required'           => 'Status is required !',
            'categories_name.unique'    => 'Categories Name already exist !',
        ]);

        $data = [
            'categories_name' => Request()->categories_name,
            'status' => Request()->status,
        ];

        $this->M_Categories->add($data);
        return redirect()->route('categories')->with('pesan', 'Data Saved Successfully !');
    }

    public function edit($id_categories)
    {
        if (!$this->M_Categories->detail($id_categories)) {
            abort(404);
        }

        $data = [
            'sidebarTitle' => 'Categories',
            'categories' => $this->M_Categories->detail($id_categories)
        ];

        return view('categories/v_edit', $data);
    }

    public function update($id_categories)
    {
        Request()->validate([
            'categories_name'   => 'required',
            'status'            => 'required',
        ], [
            'categories_name.required'  => 'Categories Name is required !',
            'status.required'           => 'Status is required !',
        ]);

        $data = [
            'categories_name' => Request()->categories_name,
            'status' => Request()->status,
        ];

        $this->M_Categories->edit($id_categories, $data);
        return redirect()->route('categories')->with('pesan', 'Data Updated Successfully !');
    }

    public function delete($id_categories)
    {
        $this->M_Categories->deleteData($id_categories);
        return redirect()->route('categories')->with('pesan', 'Data Deleted Successfully !');
    }
}
