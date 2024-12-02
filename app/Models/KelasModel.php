<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $table = 'kelas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_kelas', 'tingkat', 'tahun_ajaran', 'id_wali_kelas', 'tanggal_dibuat', 'tanggal_diubah'];
    
    // Enable timestamps
    protected $useTimestamps = true;
    
    // Optionally specify field names for created_at and updated_at if they are custom
    protected $createdField  = 'tanggal_dibuat';
    protected $updatedField  = 'tanggal_diubah';
    
    // Validation rules
    protected $validationRules = [
        'nama_kelas'     => 'required|min_length[3]|max_length[50]',
        'tingkat'        => 'required|min_length[1]|max_length[10]',
        'tahun_ajaran'   => 'required|regex_match[/^[0-9]{4}\/[0-9]{4}$/]', // Example: 2023/2024
        'id_wali_kelas'  => 'required|integer'
    ];
    
    // Error messages for validation
    protected $validationMessages = [
        'nama_kelas' => [
            'required' => 'Nama kelas harus diisi.',
            'min_length' => 'Nama kelas minimal 3 karakter.',
            'max_length' => 'Nama kelas maksimal 50 karakter.'
        ],
        'tingkat' => [
            'required' => 'Tingkat harus diisi.',
            'min_length' => 'Tingkat minimal 1 karakter.',
            'max_length' => 'Tingkat maksimal 10 karakter.'
        ],
        'tahun_ajaran' => [
            'required' => 'Tahun ajaran harus diisi.',
            'regex_match' => 'Tahun ajaran harus memiliki format YYYY/YYYY, contoh: 2023/2024.'
        ],
        'id_wali_kelas' => [
            'required' => 'Wali kelas harus dipilih.',
            'integer' => 'ID wali kelas harus berupa angka.'
        ]
    ];
    
    // Optional: A method to retrieve classes by a specific year (example)
    public function getClassesByYear($year)
    {
        return $this->where('tahun_ajaran', $year)->findAll();
    }
}
