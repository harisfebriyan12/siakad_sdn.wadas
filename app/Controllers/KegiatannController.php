<?php

namespace App\Controllers;

use App\Models\KegiatanModel;

class KegiatannController extends BaseController
{
    public function index()
    {
        $kegiatanModel = new KegiatanModel();
        $data['kegiatann'] = $kegiatanModel->findAll();
        return view('/auth/doc', $data);
    }
}
