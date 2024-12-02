<?php

namespace App\Controllers;

use App\Models\KelasModel;

class KelasController extends BaseController
{
    protected $kelasModel;

    public function __construct()
    {
        $this->kelasModel = new KelasModel();
    }

    // Menampilkan daftar kelas
    public function index()
    {
        $kelas = $this->kelasModel->findAll();
        return view('/kelas/index', ['kelas' => $kelas]);
    }

    // Menampilkan form untuk menambah kelas
    public function create()
    {
        return view('/kelas/create');
    }

    public function store()
    {
        $data = [
            'nama_kelas'     => $this->request->getPost('nama_kelas'),
            'tingkat'        => $this->request->getPost('tingkat'),
            'tahun_ajaran'   => $this->request->getPost('tahun_ajaran'),
            'id_wali_kelas'  => $this->request->getPost('id_wali_kelas'),
            'tanggal_dibuat' => date('Y-m-d H:i:s')
        ];
    
        if ($this->kelasModel->save($data) === false) {
            return redirect()->to('/kelas/index')->with('error', 'Terjadi kesalahan: ' . implode(', ', $this->kelasModel->errors()));
        }
    
        return redirect()->to('/kelas/index')->with('success', 'Data kelas berhasil ditambahkan.');
    }
    
    // Menampilkan form edit kelas
    public function edit($id)
    {
        $kelas = $this->kelasModel->find($id);
        return view('kelas/edit', ['kelas' => $kelas]);
    }

    // Mengupdate data kelas
    public function update($id)
    {
        $data = [
            'id'             => $id,
            'nama_kelas'     => $this->request->getPost('nama_kelas'),
            'tingkat'        => $this->request->getPost('tingkat'),
            'tahun_ajaran'   => $this->request->getPost('tahun_ajaran'),
            'id_wali_kelas'  => $this->request->getPost('id_wali_kelas'),
            'tanggal_diubah' => date('Y-m-d H:i:s')
        ];

        $this->kelasModel->save($data);
        return redirect()->to('/kelas/index')->with('success', 'Data kelas berhasil diperbarui.');
    }

    // Menghapus data kelas
    public function delete($id)
    {
        $this->kelasModel->delete($id);
        return redirect()->to('/kelas/index')->with('success', 'Data kelas berhasil dihapus.');
    }
}
