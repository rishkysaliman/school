<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = ['nama_siswa', 'jenis_kelamin', 'agama', 'tempat_lahir', 'tanggal_lahir', 'id_kelas', 'id_jurusan', 'image'];
    protected $visible = ['nama_siswa', 'jenis_kelamin', 'agama', 'tempat_lahir', 'tanggal_lahir', 'id_kelas', 'id_jurusan', 'image'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }
}
