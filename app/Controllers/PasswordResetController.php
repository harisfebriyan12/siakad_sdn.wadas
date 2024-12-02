<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;

class PasswordResetController extends BaseController
{
    public function forgotPassword()
    {
        return view('/auth/forgot_password');
    }

    public function sendResetLink()
    {
        $email = $this->request->getPost('email');
        $userModel = new UserModel();

        $user = $userModel->where('email', $email)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'Email tidak ditemukan.');
        }

        // Generate token dan waktu kedaluwarsa
        $token = bin2hex(random_bytes(16));
        $userModel->setResetToken($email, $token);

        // Kirim email dengan link reset password
        $resetLink = site_url("reset-password/{$token}");
        // Kirim email di sini menggunakan mailer CI4 atau lainnya (belum ditambahkan)
        return redirect()->back()->with('success', 'Link reset password telah dikirim ke email Anda.');
    }

    public function showResetForm($token)
    {
        $userModel = new UserModel();
        $user = $userModel->getUserByResetToken($token);

        if (!$user) {
            return redirect()->to('/forgot-password')->with('error', 'Token tidak valid atau sudah kedaluwarsa.');
        }

        return view('auth/reset_password', ['token' => $token]);
    }

    public function resetPassword()
    {
        $token = $this->request->getPost('token');
        $password = $this->request->getPost('password');
        $userModel = new UserModel();

        $user = $userModel->getUserByResetToken($token);
        if (!$user) {
            return redirect()->to('/auth/forgot_password')->with('error', 'Token tidak valid atau sudah kedaluwarsa.');
        }

        // Update password
        $userModel->update($user['id'], [
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);

        // Clear reset token
        $userModel->clearResetToken($user['id']);

        return redirect()->to('/auth/login')->with('success', 'Password berhasil direset. Silakan login.');
    }
}
