<?php
namespace App\Models;

use CodeIgniter\Model;

class WaliKelasModel extends Model
{
    protected $table = 'wali_kelas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_guru', 'nama_wali_kelas', 'kontak', 'tanggal_dibuat', 'tanggal_diubah'];
}
?>