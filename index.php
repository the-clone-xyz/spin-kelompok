<?php
if (isset($_COOKIE['sudah_spin']) && isset($_COOKIE['nama'])) {
    header("Location: result.php?name=" . urlencode($_COOKIE['nama']));
    exit;
}
include "db.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Spin Kelompok</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <style>
    html, body {
      height: 100%;
    }
    body {
      display: flex;
      flex-direction: column;
    }
    main {
      flex: 1;
    }
    .card:hover {
      transform: translateY(-3px);
      transition: 0.3s ease-in-out;
    }
    footer {
      margin-top: auto;
    }
  </style>
</head>
<body>
  <main>
    <div class="container py-5">
      <div class="row justify-content-center mb-5">
        <div class="col-md-6">
          <div class="card shadow border-0 rounded-4">
            <div class="card-body p-5">
              <h2 class="text-center mb-3">🎯 Spin Kelompok</h2>
              <p class="text-secondary text-center">
                Masukkan nama kamu lalu klik tombol <strong class="text-primary">Spin</strong>. 
                <br><span class="text-danger fw-bold">*Hanya bisa dilakukan sekali!*</span>
              </p>
              <form action="spin.php" method="POST">
                <label for="name" class="form-label">Pilih Nama Kamu:</label>
                <select class="form-select mb-4" name="name" required>
                  <option value="" disabled selected hidden>-- Pilih Nama --</option>
                  <?php 
                    $data = mysqli_query($conn, "SELECT * FROM nama");
                    foreach($data as $d) {
                  ?>
                    <option value="<?= $d['nama']; ?>"><?= $d['nim']; ?> - <?= $d['nama']; ?></option>
                  <?php } ?>
                </select>
                <button class="btn btn-primary btn-lg w-100" type="submit">
                  <i class="bi bi-arrow-repeat"></i> Spin Sekarang
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="row g-4">
        <?php 
        $kelompok = ['Kelompok 1', 'Kelompok 2', 'Kelompok 3'];
        foreach ($kelompok as $key => $nama_kelompok) {
          $result = mysqli_query($conn, "SELECT * FROM users WHERE result = '$nama_kelompok'");
        ?>
        <div class="col-md-4">
          <div class="card border-0 shadow rounded-4 h-100">
            <div class="card-body p-4">
              <h4 class="text-center text-primary"><i class="bi bi-people-fill me-1"></i> <?= $nama_kelompok; ?></h4>
              <ol class="mb-0">
                <?php foreach ($result as $item) { ?>
                  <li><?= $item['name']; ?></li>
                <?php } ?>
              </ol>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </main>

  <footer class="bg-light py-4 border-top shadow-sm">
    <div class="container text-center small">
      <div class="mb-2">
        &copy; <?= date("Y") ?> Yogi Syahputra
      </div>
      <div>
        <a href="https://github.com/the-clone-xyz" class="text-decoration-none me-3">
          <i class="bi bi-github"></i> GitHub
        </a>
        <a href="https://www.tiktok.com/@ruangbelajar_html" class="text-decoration-none me-3">
          <i class="bi bi-tiktok"></i> TikTok
        </a>
        <a href="https://www.instagram.com/yogisyahputra____" class="text-decoration-none">
          <i class="bi bi-instagram"></i> Instagram
        </a>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>