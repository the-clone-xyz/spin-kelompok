<?php
include "db.php";

if (isset($_COOKIE['sudah_spin']) && isset($_COOKIE['nama'])) {
    header("Location: result.php?name=" . urlencode($_COOKIE['nama']));
    exit;
}

$name = trim($_POST['name']);
$ip = $_SERVER['REMOTE_ADDR'];

if (empty($name)) {
    die("Nama tidak boleh kosong.");
}

// Cek apakah nama sudah dipakai sebelumnya
$stmt = $conn->prepare("SELECT * FROM users WHERE name = ?");
$stmt->bind_param("s", $name);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Sudah spin sebelumnya
    setcookie("sudah_spin", "1", time() + (86400 * 30), "/");
    setcookie("nama", $name, time() + (86400 * 30), "/");
    header("Location: result.php?name=" . urlencode($name));
    exit;
}

// Cek jumlah anggota per kelompok
$kelompok = ["Kelompok 1", "Kelompok 2", "Kelompok 3"];
$kelompok_tersedia = [];

foreach ($kelompok as $k) {
    $query = $conn->prepare("SELECT COUNT(*) as jumlah FROM users WHERE result = ?");
    $query->bind_param("s", $k);
    $query->execute();
    $res = $query->get_result()->fetch_assoc();

    if ($res['jumlah'] < 6) {
        $kelompok_tersedia[] = $k;
    }
}

// Cek apakah masih ada kelompok yang belum penuh
if (count($kelompok_tersedia) == 0) {
    die("Semua kelompok sudah penuh!");
}

// Pilih salah satu kelompok yang belum penuh secara acak
$hasil = $kelompok_tersedia[array_rand($kelompok_tersedia)];

// Simpan ke database
$insert = $conn->prepare("INSERT INTO users (name, result, ip_address, spin_time) VALUES (?, ?, ?, NOW())");
$insert->bind_param("sss", $name, $hasil, $ip);
$insert->execute();

// Set cookie
setcookie("sudah_spin", "1", time() + (86400 * 30), "/");
setcookie("nama", $name, time() + (86400 * 30), "/");

// Redirect ke halaman hasil
header("Location: result.php?name=" . urlencode($name));
exit;
