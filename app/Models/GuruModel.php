<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table = 'guru';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_guru', 'nip', 'kontak', 'alamat', 'tanggal_dibuat', 'status'];
    // Fungsi untuk pencarian kegiatan berdasarkan nama_kegiatan
    public function searchKegiatan($keyword)
    {
        return $this->like('nama_guru', $keyword)->findAll();
    }
}
?>