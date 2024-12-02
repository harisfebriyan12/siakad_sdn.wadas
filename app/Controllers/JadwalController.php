<?php
// app/Controllers/JadwalController.php

namespace App\Controllers;

use App\Models\JadwalModel;

class JadwalController extends BaseController
{
    protected $jadwalModel;

    public function __construct()
    {
        $this->jadwalModel = new JadwalModel();
    }

    public function index()
    {
        $data['jadwal'] = $this->jadwalModel->getJadwal();
        return view('/jadwal/index', $data);
    }

    public function create()
    {
        return view('jadwal/create');
    }

    public function store()
    {
        $this->jadwalModel->save([
            'nama_mapel' => $this->request->getPost('nama_mapel'),
            'hari' => $this->request->getPost('hari'),
            'jam_masuk' => $this->request->getPost('jam_masuk'),
            'jam_selesai' => $this->request->getPost('jam_selesai'),
            'guru_id' => $this->request->getPost('guru_id'),
        ]);

        return redirect()->to('/jadwal/index');
    }
}
?>