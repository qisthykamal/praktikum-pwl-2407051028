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

    protected $table = 'user';
    protected $guarded = ['id'];
    public $incrementing = false;
    protected $keyType = 'string';

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    protected static function booted()
    {
        static::creating(function ($model) {
            if(empty($model->{$model->getkeyName()})) {
                $model->{$model->getkeyName()} = (string) Str::uuid();
            }
        });
    }
    public function getUser()
    {
        return $this->join('kelas', 'kelas.id', '=', 'user.kelas_id')
            ->select('user.*', 'kelas.nama_kelas as nama_kelas')
            ->get();
    }
}