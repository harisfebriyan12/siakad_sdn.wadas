<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Total Siswa, Guru, Kelas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .container22 {
            display: flex;
            justify-content: space-around;
            width: 100%;
            max-width: 1200px;
            margin: 30px auto;
            flex-wrap: wrap;
        }
        .card11 {
            background-color: #ffffff;
            color: black;
            border: 1px solid #ccc;
            padding: 20px;
            margin: 10px;
            width: 250px;
            text-align: center;
            border-radius: 8px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .card11 h3 {
            margin-bottom: 10px;
            font-size: 20px;
            color: black;
        }
        .card11 p {
            font-size: 36px;
            font-weight: bold;
            margin: 10px 0;
            color: black;
        }
        .card11 .icon {
            font-size: 40px;
            margin-bottom: 10px;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container content">
        <h2 style="text-align: center; margin-top: 20px;">Data Total</h2>
        <div class="container22">
            <!-- Card for Total Siswa -->
           
            <div class="card11" data-value="560">
              <div class="icon"><i class="fas fa-user-graduate"></i></div>
              <h3>Total Siswa</h3>
              <p class="count">0</p>
          </div>

          <!-- Card for Total Guru -->
          <div class="card11" data-value="28">
              <div class="icon"><i class="fas fa-chalkboard-teacher"></i></div>
              <h3>Total Guru</h3>
              <p class="count">0</p>
          </div>

          <!-- Card for Total Kelas -->
          <div class="card11" data-value="16">
              <div class="icon"><i class="fas fa-school"></i></div>
              <h3>Total Kelas</h3>
              <p class="count">0</p>
          </div>
      </div>
  </div>

  <script>
      // Fungsi untuk animasi menghitung angka
      const animateCount = (element, target) => {
          let current = 0;
          const increment = Math.ceil(target / 50); // Kecepatan animasi
          const interval = setInterval(() => {
              current += increment;
              if (current >= target) {
                  current = target;
                  clearInterval(interval);
              }
              element.textContent = current;
          }, 50); // Interval waktu
      };

      // Jalankan animasi untuk setiap elemen dengan kelas 'count'
      document.querySelectorAll('.card11').forEach(card => {
          const value = parseInt(card.getAttribute('data-value'), 10);
          const countElement = card.querySelector('.count');
          animateCount(countElement, value);
      });
  </script>
</body>
</html>
