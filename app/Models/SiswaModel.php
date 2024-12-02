<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_siswa', 'nis', 'alamat', 'tanggal_lahir', 'kelas_id'];

    // Anda dapat menambahkan relasi jika diperlukan
    public function getSiswaByKelas($kelas_id)
    {
        return $this->where('kelas_id', $kelas_id)->findAll();
    }
}
