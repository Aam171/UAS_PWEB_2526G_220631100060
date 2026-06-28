<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM buku WHERE id = $id");
    $data = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun_terbit'];
    $status = $_POST['status'];

    $query = "UPDATE buku SET judul='$judul', penulis='$penulis', penerbit='$penerbit', tahun_terbit='$tahun', status='$status' WHERE id=$id";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Perubahan data buku berhasil disimpan!'); window.location='daftar.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data - PustakaDigital</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="hero-section" style="padding-bottom: 15px; margin-bottom: 25px;">
            <h1 style="font-size: 2rem;">PustakaDigital</h1>
            <p>Manajemen Koleksi Buku Perpustakaan</p>
        </div>

        <div class="nav">
            <a href="index.php">Beranda</a>
            <a href="daftar.php">Daftar Data</a>
            <a href="tambah.php">Tambah Data</a>
        </div>
        
        <div style="max-width: 600px; margin: 0 auto; background: #ffffff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02);">
            <h2 style="text-align: left; font-size: 1.25rem; color: #1e293b; margin-bottom: 20px; border-bottom: 2px solid #f1f5f9; padding-bottom: 10px;">Edit Data Buku</h2>
            
            <form method="POST" action="">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                <div class="form-group">
                    <label>Judul Buku</label>
                    <input type="text" name="judul" value="<?= $data['judul'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Nama Penulis</label>
                    <input type="text" name="penulis" value="<?= $data['penulis'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Penerbit</label>
                    <input type="text" name="penerbit" value="<?= $data['penerbit'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Tahun Terbit</label>
                    <input type="number" name="tahun_terbit" value="<?= $data['tahun_terbit'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Status Ketersediaan</label>
                    <select name="status" required>
                        <option value="Tersedia" <?= ($data['status'] == 'Tersedia') ? 'selected' : '' ?>>Tersedia di Rak</option>
                        <option value="Dipinjam" <?= ($data['status'] == 'Dipinjam') ? 'selected' : '' ?>>Sedang Dipinjam</option>
                    </select>
                </div>
                <button type="submit" class="btn-submit" style="background-color: #f59e0b; color: white;">🔄 Update Data Buku</button>
            </form>
        </div>
    </div>
</body>
</html>