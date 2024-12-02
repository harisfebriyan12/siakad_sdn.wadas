<?php
namespace App\Controllers;

use App\Models\WaliKelasModel;
use App\Models\KelasModel;
use CodeIgniter\Controller;

class WaliKelasController extends Controller
{
    public function index()
    {
        $model = new WaliKelasModel();
        $data['walikelas'] = $model->findAll();
        echo view('/walikelas/index', $data);
    }

    public function create()
    {
        $kelasModel = new KelasModel();
        $data['kelas'] = $kelasModel->findAll();
        return view('wali_kelas/create', $data);
    }

    public function store()
    {
        $model = new WaliKelasModel();
        $data = [
            'id_guru' => $this->request->getPost('id_guru'),
            'nama_wali_kelas' => $this->request->getPost('nama_wali_kelas'),
            'kontak' => $this->request->getPost('kontak')
        ];
        $model->insert($data);
        return redirect()->to('/wali_kelas');
    }

    public function edit($id)
    {
        $model = new WaliKelasModel();
        $data['wali_kelas'] = $model->find($id);

        $kelasModel = new KelasModel();
        $data['kelas'] = $kelasModel->findAll();

        return view('wali_kelas/edit', $data);
    }

    public function update($id)
    {
        $model = new WaliKelasModel();
        $data = [
            'id_guru' => $this->request->getPost('id_guru'),
            'nama_wali_kelas' => $this->request->getPost('nama_wali_kelas'),
            'kontak' => $this->request->getPost('kontak')
        ];
        $model->update($id, $data);
        return redirect()->to('/wali_kelas');
    }

    public function delete($id)
    {
        $model = new WaliKelasModel();
        $model->delete($id);
        return redirect()->to('/wali_kelas');
    }
}
?>