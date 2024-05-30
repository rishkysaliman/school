<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = ['nip', 'nama', 'jenis_kelmain','agama', 'tempat_lahir', 'tanggal_lahir','foto'];
    protected $visible = ['nip', 'nama', 'jenis_kelmain','agama', 'tempat_lahir', 'tanggal_lahir','foto'];

    public function mapel(){
        return $this->hashMany(Mapel::class, 'id_mapel');
    }

    public function kelas(){
        return $this->hashMany(Kelas::class, 'id_kelas');
    }

}
