<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\M_Users;
use PDF; //library pdf

class C_Users extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->M_Users = new M_Users();
    }

    public function index()
    {

        $data = [
            'sidebarTitle' => 'Users',
            'users' => $this->M_Users->allData()
        ];
        return view('users/v_users', $data);
    }

    public function add()
    {
        $data = [
            'sidebarTitle' => 'Users',
        ];
        return view('users/v_add', $data);
    }

    public function insert()
    {
        Request()->validate([
            'name'              => 'required',
            'email'             => 'required|unique:users,email',
            'password'          => 'required',
            'level'             => 'required',
            'photo'             => 'required|mimes:jpg,jpeg,png,bmp|max:1024',
        ], [
            'name.required'     => 'Full Name is required !',
            'email.required'    => 'Email is required !',
            'password.required' => 'Password is required !',
            'level.required'    => 'Role is required !',
            'photo.required'    => 'Photo is required !',
            'email.unique'      => 'Email already exist !',
            'photo.mimes'       => 'Photo is jpg, jpeg, png !',
        ]);

        $file = Request()->photo;
        $fileName = date('mdYHis') . Request()->id . '.' . $file->extension();
        $file->move(public_path('foto_user'), $fileName);

        $data = [
            'name' => Request()->name,
            'email' => Request()->email,
            'password' => Hash::make(Request()->password),
            'level' => Request()->level,
            'photo' => $fileName,
        ];

        $this->M_Users->add($data);
        return redirect()->route('users')->with('pesan', 'Data Saved Successfully !');
    }

    public function edit($id_user)
    {
        if (!$this->M_Users->detail($id_user)) {
            abort(404);
        }

        $data = [
            'sidebarTitle' => 'Users',
            'user' => $this->M_Users->detail($id_user)
        ];

        return view('users/v_edit', $data);
    }

    public function update($id_user)
    {
        Request()->validate([
            'name'              => 'required',
            'email'             => 'required',
            'password'          => 'required',
            'level'             => 'required',
            'photo'             => 'mimes:jpg,jpeg,png,bmp|max:1024',
        ], [
            'name.required'     => 'Full Name is required !',
            'email.required'    => 'Email is required !',
            'password.required' => 'Password is required !',
            'level.required'    => 'Role is required !',
            'photo.mimes'       => 'Photo is jpg, jpeg, png !',
        ]);

        if (Request()->photo <> "") {
            $user = $this->M_Users->detail($id_user);
            if ($user->photo <> "") {
                unlink(public_path('foto_user') . '/' . $user->photo);
            }

            $file = Request()->photo;
            $fileName = date('mdYHis') . Request()->id . '.' . $file->extension();
            $file->move(public_path('foto_user'), $fileName);

            $data = [
                'name' => Request()->name,
                'email' => Request()->email,
                'password' => Hash::make(Request()->password),
                'level' => Request()->level,
                'photo' => $fileName,
            ];
            $this->M_Users->edit($id_user, $data);
        } else {
            //jika tidak ganti gambar/foto
            $data = [
                'name' => Request()->name,
                'email' => Request()->email,
                'password' => Hash::make(Request()->password),
                'level' => Request()->level,
            ];
            $this->M_Users->edit($id_user, $data);
        }

        return redirect()->route('users')->with('pesan', 'Data Updated Successfully !');
    }

    public function delete($id_user)
    {
        //hapus atau delete foto
        $user = $this->M_Users->detail($id_user);
        if ($user->photo <> "") {
            unlink(public_path('foto_user') . '/' . $user->photo);
        }
        $this->M_Users->deleteData($id_user);
        return redirect()->route('users')->with('pesan', 'Data Deleted Successfully !');
    }
}
