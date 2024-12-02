<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        // Membuat instance dari UserModel
        $userModel = new UserModel();
        
        // Mengambil data dari tabel users
        $data['users'] = $userModel->findAll();

        // Menampilkan view dengan data users
        return view('user/index', $data);
    }
}
