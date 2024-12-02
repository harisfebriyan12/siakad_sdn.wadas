<?php

namespace App\Models;

use CodeIgniter\Model;

class StrukturSekolahModel extends Model
{
    protected $table = 'struktur_sekolah';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'jabatan', 'kontak', 'email', 'alamat', 'parent_id'];

    public function getStruktur()
    {
        $query = $this->orderBy('parent_id', 'ASC')->findAll();
        return $query;
    }
}
