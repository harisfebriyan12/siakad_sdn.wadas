<?php
namespace App\Models;
use CodeIgniter\Model;

class PrestasiModel extends Model {
    protected $table = 'prestasi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_prestasi', 'kategori', 'tanggal', 'penghargaan', 'dokumentasi'];
}
?>