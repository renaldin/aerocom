<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Categories;
use App\Models\M_Partner;
use App\Models\M_Products;
use App\Models\M_News;

class C_Landing extends Controller
{
    public function __construct()
    {
        $this->M_Categories = new M_Categories();
        $this->M_Partner = new M_Partner();
        $this->M_Products = new M_Products();
        $this->M_News = new M_News();
    }

    public function index()
    {
        $data = [
            'sidebarTitle'  => 'Products',
            'categories'    => $this->M_Categories->dataForLanding('Aktif'),
            'partner'       => $this->M_Partner->allData(),
            'product'       => $this->M_Products->getLimit(4),
            'news'       => $this->M_News->getLimit(3, 'Aktif'),
        ];

        return view('landing/v_landing', $data);
    }
}
