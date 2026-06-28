<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data - PustakaDigital</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="hero-section" style="padding-bottom: 15px; margin-bottom: 25px;">
            <h1 style="font-size: 2rem;">A.PUSTAKA</h1>
            <p>Manajemen Koleksi Buku A.PUSTAKA</p>
        </div>

        <div class="nav">
            <a href="index.php">Beranda</a>
            <a href="daftar.php">Daftar Data</a>
            <a href="tambah.php" class="active">Tambah Data</a>
        </div>
        
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $judul = $_POST['judul'];
            $penulis = $_POST['penulis'];
            $penerbit = $_POST['penerbit'];
            $tahun = $_POST['tahun_terbit'];
            $status = $_POST['status'];

            $query = "INSERT INTO buku (judul, penulis, penerbit, tahun_terbit, status) VALUES ('$judul', '$penulis', '$penerbit', '$tahun', '$status')";
            
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Data buku berhasil ditambahkan!'); window.location='daftar.php';</script>";
            } else {
                echo "<script>alert('Gagal menambahkan data!');</script>";
            }
        }
        ?>

        <div style="max-width: 600px; margin: 0 auto; background: #ffffff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02);">
            <h2 style="text-align: left; font-size: 1.25rem; color: #1e293b; margin-bottom: 20px; border-bottom: 2px solid #f1f5f9; padding-bottom: 10px;">Formulir Tambah Buku Baru</h2>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label>Judul Buku</label>
                    <input type="text" name="judul" placeholder="Masukkan judul buku lengkap" required>
                </div>
                <div class="form-group">
                    <label>Nama Penulis</label>
                    <input type="text" name="penulis" placeholder="Contoh: Budi Raharjo" required>
                </div>
                <div class="form-group">
                    <label>Penerbit</label>
                    <input type="text" name="penerbit" placeholder="Contoh: Informatika" required>
                </div>
                <div class="form-group">
                    <label>Tahun Terbit</label>
                    <input type="number" name="tahun_terbit" placeholder="Contoh: 2024" required>
                </div>
                <div class="form-group">
                    <label>Status Ketersediaan</label>
                    <select name="status" required>
                        <option value="Tersedia">Tersedia di Rak</option>
                        <option value="Dipinjam">Sedang Dipinjam</option>
                    </select>
                </div>
                <button type="submit" class="btn-submit">💾 Simpan Data Buku</button>
            </form>
        </div>
    </div>
</body>
</html>