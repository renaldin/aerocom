<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Categories;

class C_Landing extends Controller
{
    public function __construct()
    {
        $this->M_Categories = new M_Categories();
    }

    public function index()
    {
        $data = [
            'sidebarTitle'  => 'Products',
            'categories'    => $this->M_Categories->dataForLanding('Aktif'),
        ];

        return view('landing/v_landing', $data);
    }
}
