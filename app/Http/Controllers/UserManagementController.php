<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserManagementController extends Controller
{
     public function index()
    {
        $users = [
            [
                'nama' => 'Qorina Qisthi Kamal',
                'npm' => '2407051028',
                'jurusan' => 'Ilmu Komputer',
                'prodi' => 'Manajemen Informatika'
            ]
        ];
        return view('user-management', compact('users'));

    }
public function viewData($nama=" ",$npm=" ",$jurusan=" ",$prodi=" ")
    {
        return view('detail-user', compact('nama','npm','jurusan','prodi'));
    }
}
