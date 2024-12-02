<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'StatistikController::index');  
$routes->get('/auth/login', 'AuthController::login'); // Halaman login
$routes->get('/auth/register', 'AuthController::register'); // Halaman register
$routes->post('/auth/storeRegister', 'AuthController::storeRegister'); // Simpan registrasi
$routes->post('/auth/validateLogin', 'AuthController::validateLogin'); // Validasi login
$routes->get('/auth/logout', 'AuthController::logout'); // Logout
$routes->get('/auth/dashboard', 'DashboardController::index', ['filter' => 'auth']); 
$routes->get('/auth/dashboard', 'DashboardController::total'); // Dashboard
$routes->get('/sk/index', 'StrukturSekolahController::index'); 
$routes->get('/kegiatan/kegiatan', 'KegiatanController::index');
$routes->get('/kegiatan/create', 'KegiatanController::create');
$routes->post('/kegiatan/store', 'KegiatanController::store');
$routes->get('/kegiatan/edit/(:num)', 'KegiatanController::edit/$1');
$routes->post('/kegiatan/update/(:num)', 'KegiatanController::update/$1');
$routes->get('/kegiatan/delete/(:num)', 'KegiatanController::delete/$1');
$routes->get('/kegiatan/cetak/(:num)', 'KegiatanController::cetak/$1');
$routes->get('/user/index', 'UserController::index');
$routes->get('/guru/index', 'GuruController::index');
$routes->post('/guru/store', 'GuruController::store'); // Route untuk tambah data guru
$routes->get('/guru/edit/(:num)', 'GuruController::edit/$1'); // Route untuk halaman edit
$routes->post('/guru/update/(:num)', 'GuruController::update/$1'); // Route untuk update data guru
$routes->get('/guru/delete/(:num)', 'GuruController::delete/$1');
$routes->get('/guru/cetak', 'GuruController::printGuru');
$routes->get('/guru/exportToExcel', 'GuruController::printGuru');
$routes->get('/siswa/index', 'GuruController::index');
$routes->get('/auth/forgot_password', 'PasswordResetController::forgotPassword');
$routes->post('/auth/forgot_password', 'PasswordResetController::sendResetLink');
$routes->get('/auth/reset_password/(:any)', 'PasswordResetController::showResetForm/$1');
$routes->post('/auth/reset_password', 'PasswordResetController::resetPassword');
$routes->get('/jadwal/index', 'JadwalController::index');
$routes->get('/kelas/index', 'KelasController::index');
$routes->post('kelas/store', 'KelasController::store');
$routes->post('kelas/edit', 'KelasController::edit');
$routes->get('/siswa/index', 'SiswaController::index');
$routes->get('/siswa/exportToExcel', 'SiswaController::index');
$routes->get('/kehadiran/index', 'KehadiranController::index');
$routes->post('/kehadiran/store', 'KehadiranController::store'); 
$routes->get('/walikelas/index', 'WaliKelasController::index');
$routes->get('/auth/data', 'StatistikController::index');
$routes->get('/sekolah/index', 'StrukturSekolahController::index');
$routes->get('/prestasi/tampil', 'PrestasiController::index');
$routes->get('/prestasi/create', 'PrestasiController::create');
$routes->get('/prestasi/delete/(:num)', 'PrestasiController::delete/$1'); // Menghapus prestasi
$routes->get('cetak/(:num)', 'PrestasiController::cetak/$1'); // Cetak prestasi
$routes->post('/prestasi/store', 'PrestasiController::store'); // Menyimpan prestasi
$routes->post('/prestasi/update/(:num)', 'PrestasiController::update/$1'); // Memperbarui prestasi
$routes->get('/auth/doc', 'Dokumentasi::index');
$routes->get('/mahasiswa/index', 'MahasiswaController::index');