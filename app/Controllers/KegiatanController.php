<?php

namespace App\Controllers;

use App\Models\KegiatanModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class KegiatanController extends BaseController
{
    protected $kegiatanModel;

    public function __construct()
    {
        $this->kegiatanModel = new KegiatanModel();
    }

    // Display all activities or search results
    public function index()
    {
        $search = $this->request->getVar('search');
        
        if ($search) {
            $data['kegiatan'] = $this->kegiatanModel->searchKegiatan($search);
        } else {
            $data['kegiatan'] = $this->kegiatanModel->findAll();
        }

        $data['search'] = $search;

        return view('/kegiatan/kegiatan', $data);
    }

    // Create new activity
    public function create()
    {
        return view('kegiatan/create');
    }

    // Store new activity
    public function store()
    {
        $this->kegiatanModel->save([
            'nama_kegiatan' => $this->request->getPost('nama_kegiatan'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'tanggal' => $this->request->getPost('tanggal'),
            'status' => $this->request->getPost('status'),
        ]);
        
        session()->setFlashdata('success', 'Kegiatan berhasil ditambahkan!');
        return redirect()->to('/kegiatan/kegiatan');
    }

    // Edit activity
    public function edit($id)
    {
        $data['kegiatan'] = $this->kegiatanModel->find($id);
        return view('kegiatan/edit', $data);
    }

    // Update activity
    public function update($id)
    {
        $this->kegiatanModel->update($id, [
            'nama_kegiatan' => $this->request->getPost('nama_kegiatan'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'tanggal' => $this->request->getPost('tanggal'),
            'status' => $this->request->getPost('status'),
        ]);
        
        session()->setFlashdata('success', 'Kegiatan berhasil diupdate!');
        return redirect()->to('/kegiatan/kegiatan');
    }

    // Delete activity
    public function delete($id)
    {
        $this->kegiatanModel->delete($id);
        session()->setFlashdata('success', 'Kegiatan berhasil dihapus!');
        return redirect()->to('/kegiatan/kegiatan');
    }

    // Print activity as PDF
    public function cetak($id)
    {
        $kegiatan = $this->kegiatanModel->find($id);
        if (!$kegiatan) {
            return redirect()->to('/kegiatan/cetak')->with('message', 'Kegiatan tidak ditemukan');
        }

        $data['kegiatan'] = $kegiatan;

        try {
            $html = view('kegiatan/cetak', $data);

            $options = new Options();
            $options->set('defaultFont', 'Arial');
            $dompdf = new Dompdf($options);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();

            $dompdf->stream('Kegiatan_' . $kegiatan['nama_kegiatan'] . '.pdf', ["Attachment" => false]);
        } catch (\Exception $e) {
            return redirect()->to('/kegiatan/kegiatan')->with('message', 'Terjadi kesalahan saat mencetak PDF: ' . $e->getMessage());
        }
    }
}
