<?php

namespace App\Controllers;

use App\Models\KehadiranModel;
use App\Models\SiswaModel;

class KehadiranController extends BaseController
{
    public function index()
    {
        $kehadiranModel = new KehadiranModel();
        $siswaModel = new SiswaModel();

        $data['kehadiran'] = $kehadiranModel->findAll();
        $data['siswa'] = $siswaModel->findAll();
        return view('/kehadiran/index', $data);
    }

    public function store()
    {
        $kehadiranModel = new KehadiranModel();

        // Validasi input
        $this->validate([
            'siswa_id' => 'required',
            'tanggal' => 'required',
            'status' => 'required'
        ]);

        if ($this->request->getMethod() == 'post') {
            $kehadiranModel->save([
                'siswa_id' => $this->request->getPost('siswa_id'),
                'tanggal' => $this->request->getPost('tanggal'),
                'status' => $this->request->getPost('status'),
            ]);

            session()->setFlashdata('success', 'Data Kehadiran Berhasil Ditambahkan');
        }

        return redirect()->to('/kehadiran/index');
    }

    public function edit($id)
    {
        $kehadiranModel = new KehadiranModel();
        $siswaModel = new SiswaModel();

        $data['kehadiran'] = $kehadiranModel->find($id);
        $data['siswa'] = $siswaModel->findAll();

        return view('/kehadiran/edit', $data);
    }

    public function update()
    {
        $kehadiranModel = new KehadiranModel();

        $this->validate([
            'siswa_id' => 'required',
            'tanggal' => 'required',
            'status' => 'required'
        ]);

        $kehadiranModel->save([
            'id' => $this->request->getPost('id'),
            'siswa_id' => $this->request->getPost('siswa_id'),
            'tanggal' => $this->request->getPost('tanggal'),
            'status' => $this->request->getPost('status')
        ]);

        session()->setFlashdata('success', 'Data Kehadiran Berhasil Diperbarui');
        return redirect()->to('/kehadiran/kehadiran');
    }

    public function delete($id)
    {
        $kehadiranModel = new KehadiranModel();
        $kehadiranModel->delete($id);
        session()->setFlashdata('success', 'Data Kehadiran Berhasil Dihapus');
        return redirect()->to('/kehadiran/index');
    }
}
