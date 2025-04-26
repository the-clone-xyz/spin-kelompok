<?php
include "db.php";

if (!isset($_GET['name'])) {
    die("Data tidak valid.");
}

$name = $_GET['name'];

$stmt = $conn->prepare("SELECT result FROM users WHERE name = ?");
$stmt->bind_param("s", $name);
$stmt->execute();
$result = $stmt->get_result();
?>

<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hasil Kelompok</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css" />
    <style>
      .kelompok-card h3 {
        font-size: 1.3rem;
        font-weight: bold;
      }

    </style>
  </head>
  <body>
    <main>

        <div class="container py-5">
          <div class="row justify-content-center mb-4">
            <div class="col-md-8">
              <div class="card border-0 shadow rounded-4 bg-white">
                <div class="card-body text-center p-5">
                  <?php if ($row = $result->fetch_assoc()) : ?>
                    <h2 class="mb-3">Halo, <span class="text-primary"><?= htmlspecialchars($name) ?></span>!</h2>
                    <p class="lead">Kamu tergabung dalam: <span class="badge bg-success fs-6"><?= $row['result'] ?></span></p>
                  <?php else : ?>
                    <div class="alert alert-warning">Nama tidak ditemukan.</div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
    
          <div class="row g-4">
            <?php
            $kelompok_list = [
              'Kelompok 1' => 'primary',
              'Kelompok 2' => 'warning',
              'Kelompok 3' => 'danger'
            ];
    
            foreach ($kelompok_list as $kel => $color) {
              $data = mysqli_query($conn, "SELECT name FROM users WHERE result = '$kel'");
            ?>
            <div class="col-md-4">
              <div class="card shadow border-0 rounded-4 kelompok-card">
                <div class="card-body p-4">
                  <h3 class="text-<?= $color ?>"><i class="bi bi-people-fill me-1"></i> <?= $kel ?></h3>
                  <ol class="mt-3 mb-0 ps-3">
                    <?php foreach ($data as $item): ?>
                      <li><?= htmlspecialchars($item['name']) ?></li>
                    <?php endforeach; ?>
                  </ol>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
    </main>
    <footer class="bg-light py-4 mt-auto border-top">
    <div class="container text-center small">
        <div class="mb-2">
        &copy; <?= date("Y") ?> Yogi Syahputra
        </div>
        <div>
        <a href="https://github.com/the-clone-xyz" class="text-decoration-none me-3">
            <i class="bi bi-github"></i> GitHub</a>
        <a href="https://www.tiktok.com/@ruangbelajar_html" class="text-decoration-none me-3">
            <i class="bi bi-tiktok"></i> TikTok</a>
        <a href="https://www.instagram.com/yogisyahputra____" class="text-decoration-none">
            <i class="bi bi-instagram"></i> Instagram</a>
        </div>
    </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
