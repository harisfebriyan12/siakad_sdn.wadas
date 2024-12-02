<?php
namespace App\Controllers;
use App\Models\GuruModel;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class GuruController extends BaseController
{
    protected $guruModel;

    public function __construct()
    {
        $this->guruModel = new GuruModel();
    }

    // Menampilkan daftar guru
    public function index()
    {
        $guru = $this->guruModel->findAll();
        return view('/guru/index', ['guru' => $guru]);
    }

    public function store()
    {
        $data = [
            'nama_guru' => $this->request->getPost('nama_guru'),
            'nip' => $this->request->getPost('nip'),
            'kontak' => $this->request->getPost('kontak'),
            'alamat' => $this->request->getPost('alamat'),
            'status' => $this->request->getPost('status'), // Menambahkan status
            'tanggal_dibuat' => date('Y-m-d H:i:s')
        ];
    
        $this->guruModel->save($data);
        return redirect()->to('/guru/index')->with('success', 'Data guru berhasil ditambahkan.');
    }

    // Menampilkan form edit guru
    public function edit($id)
    {
        $guru = $this->guruModel->find($id);
        return view('/guru/edit', ['guru' => $guru]);
    }

    // Mengupdate data guru
    public function update($id)
    {
        $data = [
            'id' => $id,
            'nama_guru' => $this->request->getPost('nama_guru'),
            'nip' => $this->request->getPost('nip'),
            'kontak' => $this->request->getPost('kontak'),
            'alamat' => $this->request->getPost('alamat')
        ];

        $this->guruModel->save($data);
        return redirect()->to('/guru/index')->with('success', 'Data guru berhasil diperbarui.');
    }

    // Menghapus data guru
    public function delete($id)
    {
        $this->guruModel->delete($id);
        return redirect()->to('/guru/index')->with('success', 'Data guru berhasil dihapus.');
    }

    // Fungsi pencarian data guru
    public function search()
    {
        $keyword = $this->request->getGet('keyword');
        $guru = $this->guruModel->searchGuru($keyword);
        return view('/guru/index', ['guru' => $guru]);
    }

    public function printGuru()
    {
        $guruModel = new GuruModel();
        $data['guru'] = $guruModel->findAll();

        // Load HTML content for the PDF
        $html = view('/guru/cetak', $data);

        // Initialize Dompdf
        $dompdf = new Dompdf();

        // Load HTML content into Dompdf
        $dompdf->loadHtml($html);

        // Set paper size
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (first pass)
        $dompdf->render();

        // Stream the file (this will force download)
        $dompdf->stream('data_guru.pdf');
    }

    public function exportToExcel()
    {
        $guru = $this->guruModel->findAll();

        // Membuat objek Spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menambahkan judul pada sheet
        $sheet->mergeCells('A1:F1');
        $sheet->setCellValue('A1', 'Data Guru');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Menetapkan header untuk setiap kolom
        $sheet->setCellValue('A2', 'No')
              ->setCellValue('B2', 'NIP')
              ->setCellValue('C2', 'Nama Guru')
              ->setCellValue('D2', 'Kontak')
              ->setCellValue('E2', 'Alamat')
              ->setCellValue('F2', 'Tanggal Dibuat');
        
        // Menerapkan gaya pada header
        $headerStyle = $sheet->getStyle('A2:F2');
        $headerStyle->getFont()->setBold(true);
        $headerStyle->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $headerStyle->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('DDDDDD');

        $row = 3;
        foreach ($guru as $index => $g) {
            $sheet->setCellValue('A' . $row, $index + 1)
                  ->setCellValue('B' . $row, $g['nip'])
                  ->setCellValue('C' . $row, $g['nama_guru'])
                  ->setCellValue('D' . $row, $g['kontak'])
                  ->setCellValue('E' . $row, $g['alamat'] ?: '-')
                  ->setCellValue('F' . $row, date('d-m-Y', strtotime($g['tanggal_dibuat'])));
            $row++;
        }

        // Menambahkan auto filter
        $sheet->setAutoFilter('A2:F2');

        // Menyesuaikan lebar kolom secara otomatis
        foreach (range('A', 'F') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        // Menulis ke file Excel
        $writer = new Xlsx($spreadsheet);
        $filename = 'Data_Guru_' . date('Y-m-d_H-i-s') . '.xlsx';

        // Mengatur header untuk unduhan file
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Pastikan tidak ada output sebelum pengaturan header
        ob_clean();
        $writer->save('php://output');
        exit;
    }
}
?>