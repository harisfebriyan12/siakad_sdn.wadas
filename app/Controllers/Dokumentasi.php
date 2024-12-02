<?php
namespace App\Controllers;

use App\Models\DokumentasiModel;
use CodeIgniter\Controller;

class Dokumentasi extends Controller
{
    public function index()
    {
        $model = new DokumentasiModel();
        $data['dokumentasi'] = $model->findAll();
        return view('/auth/doc', $data);
    }

      }
?>