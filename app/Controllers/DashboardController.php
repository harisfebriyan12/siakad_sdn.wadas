<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class DashboardController extends BaseController
{
    public function index()
    {
        // Ambil role dari session
        $data['role'] = session()->get('role');
        
        // Koneksi database untuk mengambil total data dari berbagai tabel
        $db = \Config\Database::connect();
        $data['total_kegiatan'] = $db->table('kegiatan')->countAll();
        $data['total_guru'] = $db->table('guru')->countAll();
        $data['total_users'] = $db->table('users')->countAll();
        $data['total_jadwal'] = $db->table('jadwal')->countAll();
        $data['total_kelas'] = $db->table('kelas')->countAll();
        $data['total_siswa'] = $db->table('siswa')->countAll();
        $data['total_prestasi'] = $db->table('prestasi')->countAll();

        // Kirim data ke view
        return view('auth/dashboard', $data);
    }
}
?>