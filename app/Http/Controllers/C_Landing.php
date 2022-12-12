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
            'heroTitle'     => 'Landing Page',
            'categories'    => $this->M_Categories->dataForLanding('Aktif'),
            'partner'       => $this->M_Partner->allData(),
            'product'       => $this->M_Products->getLimit(4),
            'news'       => $this->M_News->getLimit(3, 'Aktif'),
        ];

        return view('landing/v_landing', $data);
    }

    public function productByCategories($id_categories)
    {
        $data = [
            'heroTitle'     => 'Product',
            'categories'    => $this->M_Categories->detail($id_categories),
            'product'       => $this->M_Products->getProductByCategories($id_categories),
        ];

        return view('landing/v_product', $data);
    }

    public function productDetail($id_product)
    {
        $data = [
            'heroTitle'     => 'Product',
            'product'       => $this->M_Products->detail($id_product),
        ];

        return view('landing/v_productDetail', $data);
    }

    public function news()
    {
        $data = [
            'heroTitle'     => 'News',
            'news' => $this->M_News->allData()
        ];
        return view('landing/v_news', $data);
    }

    public function newsDetail($id_news)
    {
        if (!$this->M_News->detail($id_news)) {
            abort(404);
        }

        $data = [
            'heroTitle'     => 'News',
            'news' => $this->M_News->detail($id_news)
        ];

        return view('landing/v_newsDetail', $data);
    }
}
