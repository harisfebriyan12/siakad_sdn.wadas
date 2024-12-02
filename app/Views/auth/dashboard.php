<?= $this->include('auth/top-page'); ?>

<style>
    /* Global Styling */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f7f7f7;
    color: #333;
}

.card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease-in-out;
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}

.card .icon-box {
    display: inline-block;
    background-color: #4c6ef5;
    padding: 10px;
    border-radius: 50%;
    color: #fff;
    font-size: 24px;
    width: 50px;
    height: 50px;
    text-align: center;
    line-height: 50px;
}

.card .ml-3 {
    margin-left: 15px;
}

.card .mb-3 {
    margin-bottom: 15px;
}

.card h6 {
    font-size: 1.1rem;
    font-weight: 600;
    color: #333;
}

.card p {
    color: #666;
    font-size: 0.9rem;
}

/* Responsive Styling */
@media (max-width: 767px) {
    .card {
        padding: 20px;
        margin-bottom: 15px;
    }
    .card .ml-3 {
        margin-left: 10px;
    }
    .card h3 {
        font-size: 1.5rem;
    }
}

@media (min-width: 768px) and (max-width: 1024px) {
    .card {
        padding: 25px;
    }
    .card .ml-3 {
        margin-left: 15px;
    }
    .card h3 {
        font-size: 1.8rem;
    }
}

/* Grid Layout for Total Cards */
@media (min-width: 1025px) {
    .card-container {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
    }

    .card-container .card {
        padding: 30px;
    }
}

</style>
<!-- Ucapan Selamat Datang dan Peringatan -->
<div class="container my-4">
    <div class="alert alert-success d-flex align-items-center p-4 rounded-lg shadow-md transition duration-500 ease-in-out transform hover:scale-105" role="alert">
        <div>
            <?php 
            $session = session();
            $role = $session->get('role');
            $nama = htmlspecialchars($session->get('nama'));
            $ucapan = $role === 'admin' ? "Admin" : ($role === 'guru' ? "Guru" : "Siswa");
            echo "<h5 class='mb-1 text-indigo-800'>Selamat Datang $ucapan, $nama!</h5>";
            ?>
            <small class="text-gray-600">Ingat untuk selalu menjaga keamanan akun Anda dan jangan pernah berbagi password kepada siapapun.</small>
        </div>
    </div>      
</div>

<!-- Main Content -->
<div class="container">
    <?php if ($role === 'siswa' || $role === 'guru') : ?>
        <h4 class="text-indigo-800 mb-3 font-semibold">ðŸ“… Kegiatan Terjadwal dalam 1 Bulan Terakhir</h4>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php
            $db = \Config\Database::connect();
            $builder = $db->table('kegiatan');
            $builder->select('id, nama_kegiatan, deskripsi, tanggal, status');
            $builder->where('tanggal >=', date('Y-m-d', strtotime('-1 month')));
            $builder->where('status', 'Terjadwal');
            $builder->orderBy('tanggal', 'DESC');
            $query = $builder->get();
            $kegiatan = $query->getResult();

            if (count($kegiatan) > 0) {
                foreach ($kegiatan as $item) {
                    $iconClass = $role === 'guru' ? 'fa-chalkboard-teacher' : 'fa-user-graduate';
                    echo '
                        <div class="transform transition duration-500 hover:scale-105">
                            <div class="card shadow-lg border border-gray-300 rounded-lg overflow-hidden animate-fadeInUp">
                                <div class="card-header bg-indigo-600 text-white flex items-center p-3">
                                    <i class="fas ' . $iconClass . ' text-yellow-300 mr-2"></i>
                                    <h6 class="card-title mb-0 font-semibold">' . htmlspecialchars($item->nama_kegiatan) . '</h6>
                                </div>
                                <div class="card-body p-4 bg-white">
                                    <p class="text-sm text-gray-600 mb-2"><strong>Tanggal:</strong> ' . date('d M Y', strtotime($item->tanggal)) . '</p>
                                    <p class="text-sm text-gray-700 mb-2"><strong>Deskripsi:</strong> ' . htmlspecialchars($item->deskripsi ?: 'Tidak ada deskripsi') . '</p>
                                    <span class="badge bg-yellow-500 text-white font-semibold rounded-full py-1 px-3">Status: ' . htmlspecialchars($item->status) . '</span>
                                </div>
                                <div class="card-footer p-3 text-right">
                                    <a href="' . site_url('/kegiatan/cetak/' . $item->id) . '" class="btn btn-info btn-sm">
                                        <i class="fas fa-print"></i> Cetak
                                    </a>
                                </div>
                            </div>
                        </div>';
                }
            } else {
                echo '
                    <div class="col-span-full">
                        <div class="alert alert-info text-center shadow-md p-4 rounded-lg bg-blue-100 text-blue-800 animate-bounce" role="alert">
                            Tidak ada kegiatan terjadwal dalam 1 bulan terakhir.
                        </div>
                    </div>';
            }
            ?>
        </div>
    <?php endif; ?>
    <div class="container">
    <?php if ($role === 'siswa' || $role === 'guru') : ?>
        <h4 class="text-indigo-800 mb-3 font-semibold">🏆 Prestasi dalam 1 Bulan Terakhir</h4>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php
            $db = \Config\Database::connect();
            $builder = $db->table('prestasi');
            $builder->select('id, nama_prestasi, kategori, tanggal, penghargaan, dokumentasi');
            $builder->where('DATE(tanggal) >=', date('Y-m-d', strtotime('-1 month')));
            $builder->orderBy('tanggal', 'DESC');
            $query = $builder->get();
            $prestasi = $query->getResult();

            if (!empty($prestasi)) {
                foreach ($prestasi as $item) {
                    $iconClass = $role === 'guru' ? 'fa-chalkboard-teacher' : 'fa-user-graduate';
                    echo '
                        <div class="transform transition duration-500 hover:scale-105">
                            <div class="card shadow-lg border border-gray-300 rounded-lg overflow-hidden animate-fadeInUp">
                                <div class="card-header bg-indigo-600 text-white flex items-center p-3">
                                    <i class="fas ' . $iconClass . ' text-yellow-300 mr-2"></i>
                                    <h6 class="card-title mb-0 font-semibold">' . htmlspecialchars($item->nama_prestasi) . '</h6>
                                </div>
                                <div class="card-body p-4 bg-white">
                                    <p class="text-sm text-gray-600 mb-2"><strong>Tanggal:</strong> ' . date('d M Y', strtotime($item->tanggal)) . '</p>
                                    <p class="text-sm text-gray-700 mb-2"><strong>Kategori:</strong> ' . htmlspecialchars($item->kategori ?: 'Tidak ada kategori') . '</p>
                                    <p class="text-sm text-gray-700 mb-2"><strong>Penghargaan:</strong> ' . htmlspecialchars($item->penghargaan ?: 'Tidak ada penghargaan') . '</p>
                                    <p class="text-sm text-gray-700 mb-2"><strong>Dokumentasi:</strong> ' . htmlspecialchars($item->dokumentasi ?: 'Tidak ada dokumentasi') . '</p>
                                </div>
                                <div class="card-footer p-3 text-right">
                                    <a href="' . site_url('/prestasi/cetak/' . $item->id) . '" class="btn btn-info btn-sm">
                                        <i class="fas fa-print"></i> Cetak
                                    </a>
                                </div>
                            </div>
                        </div>';
                }
            } else {
                echo '
                    <div class="col-span-full">
                        <div class="alert alert-info text-center shadow-md p-4 rounded-lg bg-blue-100 text-blue-800 animate-bounce" role="alert">
                            Tidak ada prestasi dalam 1 bulan terakhir.
                        </div>
                    </div>';
            }
            ?>
        </div>
    <?php endif; ?>
</div>


<?php if ($role === 'admin'): ?>
    <div class="container my-4">
        <div class="row">
            <!-- Total Guru -->
            <div class="col-md-3">
                <div class="card shadow-sm rounded-lg p-3 mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="icon-box">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div class="ml-3">
                            <h6 class="mb-0 text-muted">Total Guru</h6>
                            <h3 class="mb-0"><?= number_format($total_guru) ?></h3>
                        </div>
                    </div>
                    <p class="text-muted">Jumlah semua guru yang terdaftar</p>
                </div>
            </div>
            <!-- Total prestasi -->
            <div class="col-md-3">
                <div class="card shadow-sm rounded-lg p-3 mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="icon-box">
                            <i class="fas fa-trophy mr-2"></i>
                        </div>
                        <div class="ml-3">
                            <h6 class="mb-0 text-muted">Total Prestasi</h6>
                            <h3 class="mb-0"><?= number_format($total_prestasi) ?></h3>
                        </div>
                    </div>
                    <p class="text-muted">Jumlah Prestasi yang terdaftar di sekolah</p>
                </div>
            </div>
           
<?php endif; ?>