<?php

namespace App\Models;

use CodeIgniter\Model;

class StatistikModel extends Model
{
    protected $table = '';
    protected $primaryKey = 'id';

    // Ambil total siswa
    public function getTotalSiswa()
    {
        return $this->db->table('siswa')->countAllResults();
    }

    // Ambil total guru
    public function getTotalGuru()
    {
        return $this->db->table('guru')->countAllResults();
    }

    // Ambil total kelas
    public function getTotalKelas()
    {
        return $this->db->table('kelas')->countAllResults();
    }
}
