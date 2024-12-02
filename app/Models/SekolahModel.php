<?php
namespace App\Models;

use CodeIgniter\Model;

class SekolahModel extends Model
{
    protected $table = 'sekolah';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'jabatan', 'kontak', 'email', 'alamat', 'tanggal_dibuat', 'tanggal_diubah'];
}
?>