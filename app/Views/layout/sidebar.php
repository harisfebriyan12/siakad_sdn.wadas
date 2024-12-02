<!-- Tambahkan TailwindCSS dan Font Awesome -->
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>

<div class="flex">
  <!-- Sidebar yang tidak dapat digulir -->
  <div class="w-64 bg-[#0056b3] text-white h-screen sticky top-0 shadow-lg transform transition-all duration-300 ease-in-out">
    <div class="p-4 flex items-center text-lg font-bold border-b border-indigo-700">
      <!-- Logo di sebelah teks -->
      <img src="https://i0.wp.com/sdgambiranomjogja.sch.id/wp-content/uploads/2017/06/sd-negeri-gambiranom-jogja-logo.png?fit=300%2C307&ssl=1" alt="Logo" class="h-130 w-50 rounded-full mb-2"> <!-- Logo lebih besar -->
    </div>
    <div class="p-4">
      <div class="text-sm text-indigo-200 mb-2">
        SDN 01 WADAS
      </div>
      <ul>
        <li class="mb-2">
          <a class="flex items-center p-2 text-white bg-[#0056b3] rounded-lg hover:bg-indigo-700 hover:shadow-lg transition-all" href="/auth/dashboard">
            <i class="fas fa-home mr-2"></i> <!-- Ikon untuk Dashboard -->
            Dashboard
          </a>
        </li>
        <?php if (session()->get('role') === 'guru' || session()->get('role') === 'siswa'): ?>
          <li class="mb-2">
            <a class="flex items-center p-2 text-indigo-200 hover:text-white hover:bg-[#0056b3] rounded-lg transition-all" href="/user/index">
              <i class="fas fa-users-cog mr-2"></i> <!-- Ikon pengguna dengan roda gigi -->
              Kelola Pengguna
            </a>
          </li>
          <?php endif; ?>
          <li class="mb-2">
            <a class="flex items-center p-2 text-indigo-200 hover:text-white hover:bg-[#0056b3] rounded-lg transition-all" href="/guru/index">
              <i class="fas fa-user-graduate mr-2"></i> <!-- Ikon siswa -->
              Guru
            </a>
          </li>  
         <li class="mb-2">
    <a class="flex items-center p-2 text-indigo-200 hover:text-white hover:bg-[#0056b3] rounded-lg transition-all" href="/prestasi/tampil">
        <i class="fas fa-trophy mr-2"></i> <!-- Ganti ikon menjadi trophy -->
        Prestasi
    </a>
</li>

                  <?php if (session()->get('role') === 'guru' || session()->get('role') === 'siswa'): ?>
          <li class="mb-2">
            <a class="flex items-center p-2 text-indigo-200 hover:text-white hover:bg-[#0056b3] rounded-lg transition-all" href="/sekolah/index">
              <i class="fas fa-chalkboard-teacher mr-2"></i> <!-- Ikon guru -->
              Struktur Sekolah
            </a>
          </li> <?php endif; ?>
          <?php if (session()->get('role') === 'guru' || session()->get('role') === 'siswa'): ?>
          <li class="mb-2">
            <a class="flex items-center p-2 text-indigo-200 hover:text-white hover:bg-[#0056b3] rounded-lg transition-all" href="/kelas/index">
              <i class="fas fa-door-open mr-2"></i> <!-- Ikon kelas -->
              Data Kelas
            </a>
          </li>
        <li class="mb-2">
          <a class="flex items-center p-2 text-indigo-200 hover:text-white hover:bg-[#0056b3] rounded-lg transition-all" href="/walikelas/index">       <i class="fas fa-calendar-alt mr-2"></i> <!-- Ikon jadwal -->
            Jadwal Mata Pelajaran
          </a>
        </li>  <?php endif; ?>
        <?php if (session()->get('role') === 'siswa'): ?>
          <li class="mb-2">
            <a class="flex items-center p-2 text-indigo-200 hover:text-white hover:bg-[#0056b3] rounded-lg transition-all" href="/kegiatan/kegiatan">
              <i class="fas fa-calendar-check mr-2"></i> <!-- Ikon kegiatan -->
              Kegiatan
            </a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</div>
