<?php

namespace App\Controllers;

use App\Models\PrestasiModel;

class PrestasiController extends BaseController
{
    protected $prestasiModel;

    public function __construct()
    {
        $this->prestasiModel = new PrestasiModel();
    }

    public function index()
    {
        $data['prestasi'] = $this->prestasiModel->findAll(); // Mengambil semua data prestasi
        return view('/prestasi/tampil', $data); // Menampilkan ke view
    }

    public function store()
    {
        // Validasi input
        $this->validate([
            'nama_prestasi' => 'required',
            'kategori'      => 'required',
            'tanggal'       => 'required|valid_date',
            'penghargaan'   => 'required',
     ]);

// Simpan data
        $this->prestasiModel->save([
            'nama_prestasi' => $this->request->getPost('nama_prestasi'),
            'kategori'      => $this->request->getPost('kategori'),
            'tanggal'       => $this->request->getPost('tanggal'),
            'penghargaan'   => $this->request->getPost('penghargaan'),
        ]);

        return redirect()->to('/prestasi/tampil')->with('success', 'Data prestasi berhasil ditambahkan.');
    }

    public function update($id)
    {
        // Validasi input
        $this->validate([
            'nama_prestasi' => 'required',
            'kategori'      => 'required',
            'tanggal'       => 'required|valid_date',
            'penghargaan'   => 'required',
        ]);


        // Update data
        $this->prestasiModel->update($id, [
            'nama_prestasi' => $this->request->getPost('nama_prestasi'),
            'kategori'      => $this->request->getPost('kategori'),
            'tanggal'       => $this->request->getPost('tanggal'),
            'penghargaan'   => $this->request->getPost('penghargaan'),
        ]);

        return redirect()->to('/prestasi/tampil')->with('success', 'Data prestasi berhasil diupdate.');
    }

    public function delete($id)
    {
        $prestasi = $this->prestasiModel->find($id);


        $this->prestasiModel->delete($id);
        return redirect()->to('/prestasi/tampil')->with('success', 'Data prestasi berhasil dihapus.');
    }
}
