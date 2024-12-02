<?php
namespace App\Models;

use CodeIgniter\Model;

class DokumentasiModel extends Model
{
    protected $table = 'dokumentasi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'tanggal', 'deskripsi', 'foto'];
}
?>