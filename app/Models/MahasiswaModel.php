<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'mahasiswa'; // Nama tabel
    protected $primaryKey = 'id_mhs'; // Primary key tabel
    protected $allowedFields = [
        'nim',
        'nama',
        'alamat',
        'tgl_lahir',
        'jk',
        'email',
        'foto',
        'create_date'
    ]; // Kolom yang dapat diisi
    protected $useTimestamps = false; // Tidak menggunakan timestamps otomatis

    /**
     * Ambil semua data mahasiswa.
     *
     * @return array
     */
    public function getAllMahasiswa()
    {
        return $this->findAll(); // Mengambil semua data dari tabel
    }

    /**
     * Ambil data mahasiswa berdasarkan ID.
     *
     * @param int $id
     * @return array
     */
    public function getMahasiswaById($id)
    {
        return $this->where('id_mhs', $id)->first(); // Ambil data berdasarkan ID
    }
}
