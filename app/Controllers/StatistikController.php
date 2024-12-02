<?php

namespace App\Controllers;

use App\Models\StatistikModel;

class StatistikController extends BaseController
{
    public function index()
    {
        $statistikModel = new StatistikModel();

        $data = [
            'total_siswa' => $statistikModel->getTotalSiswa(),
            'total_guru' => $statistikModel->getTotalGuru(),
            'total_kelas' => $statistikModel->getTotalKelas(),
        ];

        // Kirim data ke view
        return view('/auth/data', $data);
    }
}
