<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanModel extends Model
{
    protected $table = 'kegiatan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_kegiatan', 'deskripsi', 'tanggal', 'status'];
    protected $useTimestamps = true;
    // Metode untuk pencarian berdasarkan nama_kegiatan atau deskripsi
    public function search($keyword)
    {
        return $this->like('nama_kegiatan', $keyword)
                    ->orLike('deskripsi', $keyword)
                    ->findAll();
    }

    // Metode untuk mencari berdasarkan status tertentu
    public function searchByStatus($nama_kegiatan)
    {
        return $this->where('nama_kegiatan', $nama_kegiatan)->findAll();
    }
}
?>