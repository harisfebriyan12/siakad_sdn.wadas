<div class="container">
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
</div>