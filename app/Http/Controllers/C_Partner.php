<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Partner;

class C_Partner extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->M_Partner = new M_Partner();
    }

    public function index()
    {

        $data = [
            'sidebarTitle' => 'Partner',
            'partner' => $this->M_Partner->allData()
        ];
        return view('partner/v_partner', $data);
    }

    public function add()
    {
        $data = [
            'sidebarTitle' => 'Partner',
        ];
        return view('partner/v_add', $data);
    }

    public function insert()
    {
        Request()->validate([
            'partner_name'      => 'required',
            'partner_image'     => 'required|mimes:jpg,jpeg,png,bmp|max:1024',
        ], [
            'partner_name.required'     => 'Partner Name is required !',
            'partner_image.required'    => 'Partner Image is required !',
            'partner_image.mimes'       => 'Partner Image is jpg, jpeg, png !',
        ]);

        $file = Request()->partner_image;
        $fileName = date('mdYHis') . Request()->id_partner . '.' . $file->extension();
        $file->move(public_path('foto_partner'), $fileName);

        $data = [
            'partner_name' => Request()->partner_name,
            'partner_image' => $fileName,
        ];

        $this->M_Partner->add($data);
        return redirect()->route('partner')->with('pesan', 'Data Saved Successfully !');
    }

    public function edit($id_partner)
    {
        if (!$this->M_Partner->detail($id_partner)) {
            abort(404);
        }

        $data = [
            'sidebarTitle' => 'Partner',
            'partner' => $this->M_Partner->detail($id_partner)
        ];

        return view('partner/v_edit', $data);
    }

    public function update($id_partner)
    {
        Request()->validate([
            'partner_name'      => 'required',
            'partner_image'     => 'mimes:jpg,jpeg,png,bmp|max:1024',
        ], [
            'partner_name.required'     => 'Partner Name is required !',
            'partner_image.mimes'       => 'Partner Image is jpg, jpeg, png !',
        ]);

        if (Request()->partner_image <> "") {
            $partner = $this->M_Partner->detail($id_partner);
            if ($partner->partner_image <> "") {
                unlink(public_path('foto_partner') . '/' . $partner->partner_image);
            }

            $file = Request()->partner_image;
            $fileName = date('mdYHis') . Request()->id_partner . '.' . $file->extension();
            $file->move(public_path('foto_partner'), $fileName);

            $data = [
                'partner_name' => Request()->partner_name,
                'partner_image' => $fileName,
            ];
            $this->M_Partner->edit($id_partner, $data);
        } else {
            //jika tidak ganti gambar/foto
            $data = [
                'partner_name' => Request()->partner_name,
            ];
            $this->M_Partner->edit($id_partner, $data);
        }

        return redirect()->route('partner')->with('pesan', 'Data Updated Successfully !');
    }

    public function delete($id_partner)
    {
        //hapus atau delete foto
        $partner = $this->M_Partner->detail($id_partner);
        if ($partner->partner_image <> "") {
            unlink(public_path('foto_partner') . '/' . $partner->partner_image);
        }
        $this->M_Partner->deleteData($id_partner);
        return redirect()->route('partner')->with('pesan', 'Data Deleted Successfully !');
    }
}
