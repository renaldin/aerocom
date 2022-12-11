<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Categories;
use App\Models\M_Partner;

class C_Landing extends Controller
{
    public function __construct()
    {
        $this->M_Categories = new M_Categories();
        $this->M_Partner = new M_Partner();
    }

    public function index()
    {
        $data = [
            'sidebarTitle'  => 'Products',
            'categories'    => $this->M_Categories->dataForLanding('Aktif'),
            'partner'       => $this->M_Partner->allData(),
        ];

        return view('landing/v_landing', $data);
    }
}
