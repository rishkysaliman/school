<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $fillable = ['mapel', 'kode_mapel', 'id_guru'];
    protected $visible = ['mapel', 'kode_mapel', 'id_guru'];

    public function Guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }
}
