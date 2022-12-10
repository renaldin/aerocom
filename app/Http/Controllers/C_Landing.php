<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_Landing extends Controller
{

    public function index()
    {
        $data = [
            'sidebarTitle' => 'Products',
        ];

        return view('landing/v_landing', $data);
    }
}
