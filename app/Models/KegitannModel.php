<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatannModel extends Model
{
    protected $table = 'kegiatann';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'deskripsi', 'tanggal', 'gambar'];
}
