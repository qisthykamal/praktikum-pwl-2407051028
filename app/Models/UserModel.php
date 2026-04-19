<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;


class UserModel extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $table = 'users';
    protected $guarded = ['id'];
   

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    
    public function getUser()
    {
        return $this->join('kelas', 'kelas.id', '=', 'users.kelas_id')
            ->select('users.*', 'kelas.nama_kelas as nama_kelas')
            ->get();
    }
}