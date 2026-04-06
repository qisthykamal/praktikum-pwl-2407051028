<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;

class UserManagementController extends Controller
{
    public $userModel;
    public $kelasModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }
public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'npm' => 'required|string|max:255',
                'kelas_id' => 'required|exists:kelas,id'
            ]);
            $this->userModel->create([
                'name' => $request->input('name'),
                'npm' => $request->input('npm'),
                'kelas_id' => $request->input('kelas_id')
            ]);
            Log::info('User created successfully');
            return redirect()->route('user-management.index')->with('success', 'User berhasil dibuat');
        } catch (Exception $e) {
            Log::error('User creation failed: ' . $e->getMessage());
            return redirect()->route('user-management.index')->with('error', 'User gagal dibuat');
        }

        $this->userModel->create([
            'name' => $request->input('name'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id')
        ]);

        return redirect()->route('user-management.index');
    }

     public function index()
    {
        $users = $this->userModel->getUser();
        return view('user-management', compact('users'));
    }
   public function create()
    {
        $kelas = $this->kelasModel->getKelas();
        return view('create-user', compact('kelas'));
    }
    
    
    public function viewData($nama=" ",$npm=" ",$jurusan=" ",$prodi=" ")
    {
        return view('detail-user', compact('nama','npm','jurusan','prodi'));
    }
    
    public function update(Request $request, $id)
    {
        try{
        $request->validate([
            'name' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id'
        ]);


        DB::transaction(function() use ($id, $request) {
            $user = UserModel::findOrFail($id);
            $user->update([
                'name' => $request->input('name'),
                'npm' => $request->input('npm'),
                'kelas_id' => $request->input('kelas_id')
            ]);
        });
        return redirect()->route('user-management.index')->with('success', 'User berhasil diupdate');
    }


        catch(Exception $e){
            Log::error('User update failed: ' . $e->getMessage());
            return redirect()->route('user-management.index')->with('error', 'User gagal diupdate');
        }
    }

    public function destroy($id)
    {
        $user = UserModel::findOrFail($id);
        $user->delete();
        return redirect()->route('user-management.index');
    }
    
   public function edit($id)
{
    $user = UserModel::findOrFail($id);

    return view('user-management-edit', compact('user'));
}
}

