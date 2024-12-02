<?php

namespace App\Controllers;

use App\Models\KegiatanModel;
use App\Models\UserModel;
use Mpdf\Mpdf;

class AuthController extends BaseController
{
    public function awal()
    {
        return view('auth/awal');
    }
    public function register()
    {
        return view('auth/register');
    }

    public function storeRegister()
    {
        $model = new UserModel();
        $data = [
            'nama'     => $this->request->getPost('nama'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => $this->request->getPost('role'), 
        ];

        $model->save($data);
        return redirect()->to('/auth/login')->with('success', 'Registrasi berhasil');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function validateLogin()
    {
        $model = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $user = $model->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Set session data including the user's name
            session()->set([
                'id'         => $user['id'],
                'nama'       => $user['nama'], 
                'email'      => $user['email'],
                'role'       => $user['role'],  // Add nama to the session
                'isLoggedIn' => true,
            ]);

            return redirect()->to('/auth/dashboard');
        } else {
            return redirect()->back()->with('error', 'Email atau password salah');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
    public function kegiatan()
    {
        $model = new KegiatanModel();
        $data['kegiatan'] = $model->findAll();
        return view('/kegiatan/kegiatan', $data);
    }

    public function cetakPDF()
    {
        $model = new KegiatanModel();
        $data['kegiatan'] = $model->findAll();
        
        // Load mPDF
        $mpdf = new Mpdf();
        
        // Buat HTML untuk PDF
        $html = view('', $data);
        
        // Tulis HTML ke file PDF
        $mpdf->WriteHTML($html);
        
        // Output PDF ke browser
        $mpdf->Output('Daftar_Kegiatan.pdf', 'I');
    }
    public function getReminderKegiatan()
    {
        $tanggal = $this->request->getGet('tanggal');
        $model = new KegiatanModel();
        
        // Ambil kegiatan yang terjadwal pada tanggal yang dipilih
        $kegiatan = $model->where('tanggal >=', date('Y-m-d', strtotime($tanggal)))
                          ->findAll();

        // Filter kegiatan yang membutuhkan reminder (1 minggu sebelum)
        $reminderKegiatan = [];
        foreach ($kegiatan as $k) {
            $eventDate = strtotime($k['tanggal']);
            $currentDate = time();
            $diff = ($eventDate - $currentDate) / (60 * 60 * 24); // Selisih dalam hari
            
            if ($diff <= 7 && $diff >= 0) {
                $reminderKegiatan[] = $k;
            }
        }

        return $this->response->setJSON(['kegiatan' => $reminderKegiatan]);
    }
}
