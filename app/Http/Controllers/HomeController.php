<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Products;
use App\Models\M_Categories;
use App\Models\M_Users;
use App\Models\M_News;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->M_Products = new M_Products();
        $this->M_Categories = new M_Categories();
        $this->M_Users = new M_Users();
        $this->M_News = new M_News();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'sidebarTitle' => 'Dashboard',
            'users' => $this->M_Users->numberOfUsers(),
            'categories' => $this->M_Categories->numberOfCategories(),
            'products' => $this->M_Products->numberOfProducts(),
            'news' => $this->M_News->getLimit(3, 'Aktif'),
        ];

        return view('v_home', $data);
    }
}
