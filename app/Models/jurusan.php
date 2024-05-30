<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    use HasFactory;
    protected $fillable = ['nama_jurusan'];
    protected $visible = ['nama_jurusan '];

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_jurusan');
    }
}
