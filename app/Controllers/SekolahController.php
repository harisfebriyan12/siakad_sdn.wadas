<?php
namespace App\Controllers;

use App\Models\SekolahModel;
use CodeIgniter\Controller;
use Faker\Provider\Base;

class SekolahController extends BaseController
{
    public function index()
    {
        $model = new SekolahModel();
        $data['sekolah'] = $model->findAll();
        return view('sekolah/index', $data);
    }

    public function create()
    {
        return view('sekolah/create');
    }

    public function store()
    {
        $model = new SekolahModel();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'jabatan' => $this->request->getPost('jabatan'),
            'kontak' => $this->request->getPost('kontak'),
            'email' => $this->request->getPost('email'),
            'alamat' => $this->request->getPost('alamat')
        ];
        $model->insert($data);
        return redirect()->to('/sekolah');
    }

    public function edit($id)
    {
        $model = new SekolahModel();
        $data['sekolah'] = $model->find($id);
        return view('sekolah/edit', $data);
    }

    public function update($id)
    {
        $model = new SekolahModel();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'jabatan' => $this->request->getPost('jabatan'),
            'kontak' => $this->request->getPost('kontak'),
            'email' => $this->request->getPost('email'),
            'alamat' => $this->request->getPost('alamat')
        ];
        $model->update($id, $data);
        return redirect()->to('/sekolah');
    }

    public function delete($id)
    {
        $model = new SekolahModel();
        $model->delete($id);
        return redirect()->to('/sekolah');
    }
}
?>