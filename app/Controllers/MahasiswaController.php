<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class MahasiswaController extends BaseController
{
    protected $mahasiswaModel;

    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel(); // Instansiasi model
    }

    /**
     * Tampilkan semua data mahasiswa.
     *
     * @return \CodeIgniter\HTTP\Response
     */
    public function index()
    {
        $data['mahasiswa'] = $this->mahasiswaModel->getAllMahasiswa(); // Ambil semua data
        return view('/mahasiswa/index', $data); // Kirim data ke view
    }

    /**
     * Tampilkan detail mahasiswa berdasarkan ID.
     *
     * @param int $id
     * @return \CodeIgniter\HTTP\Response
     */
    public function detail($id)
    {
        $data['mahasiswa'] = $this->mahasiswaModel->getMahasiswaById($id); // Ambil data berdasarkan ID
        if (!$data['mahasiswa']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data mahasiswa tidak ditemukan.');
        }

        return view('mahasiswa/detail', $data); // Kirim data ke view
    }
}
