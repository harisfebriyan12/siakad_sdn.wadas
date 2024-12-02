<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_kelas', 'tingkat', 'tahun_ajaran', 'id_wali_kelas', 'kelas'];
    protected $useTimestamps = true;
    protected $createdField = 'tanggal_dibuat';
    protected $updatedField = 'tanggal_diubah';
}
