<?php 
// Menggabungkan koneksi database untuk mengambil data statistik
include 'koneksi.php'; 

// 1. Variabel & Query untuk menghitung statistik data buku
$query_total = mysqli_query($conn, "SELECT COUNT(*) as total FROM buku");
$res_total = mysqli_fetch_assoc($query_total);
$total_buku = $res_total['total'];

$query_tersedia = mysqli_query($conn, "SELECT COUNT(*) as total FROM buku WHERE status = 'Tersedia'");
$res_tersedia = mysqli_fetch_assoc($query_tersedia);
$total_tersedia = $res_tersedia['total'];

$query_dipinjam = mysqli_query($conn, "SELECT COUNT(*) as total FROM buku WHERE status = 'Dipinjam'");
$res_dipinjam = mysqli_fetch_assoc($query_dipinjam);
$total_dipinjam = $res_dipinjam['total'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Sistem Pendataan Buku</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="hero-section">
            <h1>A.PUSTAKA</h1>
            <p>Sistem Pendataan Buku SMAQ Al-Asror </p>
        </div>

        <div class="nav">
            <a href="index.php" class="active">Beranda</a>
            <a href="daftar.php">Daftar Data</a>
            <a href="tambah.php">Tambah Data</a>
        </div>

        <div class="dashboard-grid">
            <div class="card card-total">
                <div class="card-icon">📚</div>
                <div class="card-info">
                    <h3>Total Koleksi</h3>
                    <p class="card-value"><?= $total_buku; ?> <span class="card-unit">Buku</span></p>
                </div>
            </div>

            <div class="card card-available">
                <div class="card-icon">✅</div>
                <div class="card-info">
                    <h3>Tersedia</h3>
                    <p class="card-value"><?= $total_tersedia; ?> <span class="card-unit">Buku</span></p>
                </div>
            </div>

            <div class="card card-borrowed">
                <div class="card-icon">📖</div>
                <div class="card-info">
                    <h3>Sedang Dipinjam</h3>
                    <p class="card-value"><?= $total_dipinjam; ?> <span class="card-unit">Buku</span></p>
                </div>
            </div>
        </div>

        <div class="quick-actions">
            <h3>Akses Cepat</h3>
            <div class="action-buttons">
                <a href="daftar.php" class="btn-action action-view">🔎 Kelola & Lihat Semua Daftar Buku</a>
                <a href="tambah.php" class="btn-action action-add">➕ Tambah Koleksi Buku Baru</a>
            </div>
        </div>

        <div class="footer-note">
            <p>Sistem Pendataan Buku &copy; <?= date('Y'); ?> | SMA Al-Qur'an Al-Asror</p>
        </div>
    </div>
</body>
</html>