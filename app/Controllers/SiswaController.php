<?php
namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\KelasModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;

class SiswaController extends BaseController
{
    public function index()
    {
        $siswaModel = new SiswaModel();
        $data['siswa'] = $siswaModel->findAll();
        return view('siswa/index', $data);
    }

    public function exportToExcel()
    {
        $model = new SiswaModel();
        $kelasModel = new KelasModel();
        $kelas = $kelasModel->findAll();

        // Membuat objek Spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menambahkan judul pada sheet
        $sheet->mergeCells('A1:F1');
        $sheet->setCellValue('A1', 'Data Siswa Sdn Wadas 01');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Menetapkan header untuk setiap kolom
        $sheet->setCellValue('A2', 'Kelas')
              ->setCellValue('B2', 'No')
              ->setCellValue('C2', 'Nama Siswa')
              ->setCellValue('D2', 'NIS')
              ->setCellValue('E2', 'Alamat')
              ->setCellValue('F2', 'Tanggal Lahir');
        
        // Menerapkan gaya pada header
        $headerStyle = $sheet->getStyle('A2:F2');
        $headerStyle->getFont()->setBold(true);
        $headerStyle->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $headerStyle->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('DDDDDD');

        $row = 3;
        foreach ($kelas as $k) {
            $siswa = $model->where('kelas_id', $k['id'])->findAll();
            if (count($siswa) > 0) {
                $sheet->setCellValue('A' . $row, $k['nama_kelas']);
                $sheet->getStyle('A' . $row)->getFont()->setBold(true);
                $row++;
                $no = 1;
                foreach ($siswa as $s) {
                    $sheet->setCellValue('B' . $row, $no++)
                          ->setCellValue('C' . $row, $s['nama_siswa'])
                          ->setCellValue('D' . $row, $s['nis'])
                          ->setCellValue('E' . $row, $s['alamat'] ?: '-')
                          ->setCellValue('F' . $row, date('d-m-Y', strtotime($s['tanggal_lahir'])));
                    $row++;
                }
                $row++; // Tambahkan baris kosong antar kelas
            }
        }

        // Menambahkan auto filter
        $sheet->setAutoFilter('A2:F2');

        // Menyesuaikan lebar kolom secara otomatis
        foreach (range('A', 'F') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        // Menulis ke file Excel
        $writer = new Xlsx($spreadsheet);
        $filename = 'Data_Siswa_Per_Kelas_' . date('Y-m-d_H-i-s') . '.xlsx';

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